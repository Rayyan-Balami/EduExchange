<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function byCategory($category)
    {
        // Get all materails from the database of category $category
        $materials = DB::table('materials')
            ->join('users', 'materials.user_id', '=', 'users.id')
            ->select('materials.*', 'users.name')
            ->where('category', $category)
            ->get();

        return $materials;
        
    }
    //index page ( default Notes Materails)
    public function index()
    {

        //get name and id of the user who uploaded the material from user_id in materials table
        $materials = $this->byCategory('note');


        return Inertia::render('Notes', [
            'notes' => $materials,
        ]);
    }

    // question page
    public function question()
    {
        // Get all materails from the database of category question
        $materials = $this->byCategory('question');

        return Inertia::render('Questions', [
            'questions' => $materials,
        ]);
    }

    public function labreport()
    {
        // Get all materails from the database of category labreport
        $materials = $this->byCategory('labreport');

        return Inertia::render('Labreports', [
            'labreports' => $materials,
        ]);
    }

    public function uploadMaterialPage()
    {
        return Inertia::render('UploadForm');
    }


    public function uploadMaterialProcess(Request $request)
    {
        // Validate the request
        $request->validate([
            'requested' => 'integer|nullable',
            'title' => 'required|string|min:10|max:150',
            'description' => 'required|string|min:10|max:250',
            'category' => 'required|string|in:note,question,labreport',
            'format' => 'required|string|in:handwritten,typed,photo',
            'educationLevel' => 'required|string|in:school,+2,diploama,bachelor,master,phd',
            'semester' => 'required|string|in:first,second,third,fourth,fifth,sixth,seventh,eighth',
            'subject' => 'required|string|min:3|max:50',
            'classFaculty' => 'required|string|min:3|max:50',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'doc' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        try {
            // Store the file in storage\app\public folder
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $imgName = uniqid() . '.' . $extension;
            $imgPath = 'uploads/thumbnail/';
            $img->move($imgPath, $imgName);


            // Store the document in storage\app\public folder
            $doc = $request->file('doc');
            $extension = $doc->getClientOriginalExtension();
            $docName = uniqid() . '.' . $extension;
            $docPath = 'uploads/documents/';
            $doc->move($docPath, $docName);

            // Store data in database
            Material::create([
                'user_id' => auth()->id(), // Associate the material with the authenticated user
                'requested' => $request->requested,
                'title' => $request->title,
                'subject' => $request->subject,
                'description' => $request->description,
                'format' => $request->format,
                'education_level' => $request->educationLevel,
                'category' => $request->category,
                'semester' => $request->semester,
                'class_faculty' => $request->classFaculty,
                'author' => auth()->user()->name,
                'image_src' => $imgPath . $imgName,
                'file_src' => $docPath . $docName,
            ]);

            // Log success message
            echo "<script>alert('Material uploaded successfully');</script>";

            // Check if the store is successful
            return back()->withErrors([
                'message' => 'upload successful.',
            ]);
        } catch (\Exception $e) {
            // Log error message
            echo "<script>alert('Error uploading material. Please try again.');</script>";

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error uploading material. Please try again.');
        }
    }

    public function view(){
        //get id from the url /material/view?id=1
        $id = request('id');

        // get the material from the database with id = $id and name of the user who uploaded the material
        $material = DB::table('materials')
            ->join('users', 'materials.user_id', '=', 'users.id')
            ->select('materials.*', 'users.name')
            ->where('materials.id', $id)
            ->first();


        return Inertia::render('ViewMaterial', [
            'material' => $material,
        ]);
    }

}
