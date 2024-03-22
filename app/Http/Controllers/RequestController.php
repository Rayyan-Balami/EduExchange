<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Requests;
use Illuminate\Support\Facades\DB;


class RequestController extends Controller
{

    public function index()
    {
        //get all requests from the database with user who created the request using user_id
        $requests = DB::table('requests')
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->select('requests.*', 'users.name')
            ->get();

        return Inertia::render('Requests', [
            'requests' => $requests,
        ]);
    }


    public function requestMaterialPage()
    {
        return Inertia::render('RequestForm');
    }

    public function requestMaterialProcess(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|min:10|max:150',
            'description' => 'required|string|min:10|max:250',
            'category' => 'required|string|in:note,question,labreport',
            'educationLevel' => 'required|string|in:school,+2,diploama,bachelor,master,phd',
            'semester' => 'required|string|in:first,second,third,fourth,fifth,sixth,seventh,eighth',
            'subject' => 'required|string|min:3|max:50',
            'classFaculty' => 'required|string|min:3|max:50',
        ]);

//         array:7 [▼ // app/Http/Controllers/RequestController.php:18
//   "title" => "Need labreport of Operating system"
//   "description" => "Need labreport of Operating system"
//   "category" => "note"
//   "educationLevel" => "bachelor"
//   "semester" => "first"
//   "subject" => "Need labreport of Operating system"
//   "classFaculty" => "Need labreport of Operating system"
// ]
        try {
            // Store data in database
            Requests::create([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'education_level' => $request->educationLevel,
                'semester' => $request->semester,
                'subject' => $request->subject,
                'class_faculty' => $request->classFaculty,
                'user_id' => auth()->id(),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => 'Error in creating request',
            ]);
        }

        // Log success message
        return back()->with('message', 'Request created successfully');
    }
}
