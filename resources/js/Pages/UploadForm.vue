<template>

   <Head>
      <title>Notes</title>
   </Head>
   <Layout>
      <section>
         <!-- upload study materials title -->
         <div class="p-4 sm:p-6">
            <div class="relative mx-auto max-w-[37.5rem] py-12 text-center">
               <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                  Upload Study Materials
               </h1>
               <p class="mt-4 text-3xl space-x-6 text-slate-700">
                  <i class="fa-duotone fa-memo-pad"></i>
                  <i class="fa-duotone fa-file-circle-question"></i>
                  <i class="fa-duotone fa-display-code"></i>
               </p>
               <p class="mt-4 text-base text-slate-600">
                  Fill the form below to upload your study materials. <br />
                  Help others , others will help you.
               </p>
            </div>
         </div>

         <!-- form for title, subject, description -->
         <div class="p-4 sm:p-6 mx-auto max-w-[60rem]">
            <h2 class="text-xl font-semibold text-gray-900">
               <i class="fa-duotone fa-pencil w-4 mr-4"></i>Study Materials
            </h2>
            <p class="mt-1 text-sm text-gray-600">
               Details must be Correct, Complete and Concise [CCC], so that
               other students can understand your materials.
            </p>
            <!-- form for full name, gender, student/teacher, school name, email -->
            <form id="uploadForm" @submit.prevent="submit" enctype="multipart/form-data">
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <!-- responding to if comming from respond button -->
                  <div
                     class="relative col-span-full text-sm p-4 space-y-2 rounded-lg border border-gray-300 bg-gray-50">
                     <!-- responding to  -->
                     <div class="flex gap-2">
                        <span class="whitespace-nowrap">Responding to :</span>
                        <input required type="text" disabled value="user123" class="w-full bg-transparent" />
                     </div>
                     <!-- title -->
                     <div class="flex gap-2">
                        <span class="whitespace-nowrap">Title :</span>
                        <input required type="text" disabled value="title XYZ" class="w-full bg-transparent" />
                     </div>
                     <!-- subject -->
                     <div class="flex gap-2">
                        <span class="whitespace-nowrap">Subject :</span>
                        <input required type="text" disabled value="subject XYZ" class="w-full bg-transparent" />
                     </div>
                  </div>

                  <!-- title ()-->
                  <div class="col-span-full">
                     <label for="title" class="block mb-2 text-sm font-semibold">Title</label>
                     <input required v-model="form.title" type="text" placeholder="functions in C programming language."
                        name="title" id="title"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg" />
                     <p class="text-red-500 text-xs mt-2">{{ errors.title }}</p>

                  </div>

                  <!-- description ()-->
                  <div class="col-span-full">
                     <label for="description" class="block mb-2 text-sm font-semibold">Description</label>
                     <textarea v-model="form.description" id="description" name="description" rows="3"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg">
                        </textarea>

                     <p class="mt-2 text-sm text-gray-600">
                        Describe what you are covering in your study
                        materials.
                     </p>
                     <p class="text-red-500 text-xs mt-2">{{ errors.description }}</p>

                  </div>

                  <!-- It is a ? ()-->
                  <div class="relative sm:col-span-2">
                     <label for="category" class="block mb-2 text-sm font-semibold">It is a ?</label>
                     <select v-model="form.category" name="category" id="category"
                        class="block w-full px-5 py-3 mt-2 appearance-none text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg">
                        <option value="" disabled selected>
                           Select an option...
                        </option>
                        <option value="note" name="category">Note</option>
                        <option value="question" name="category">
                           Question
                        </option>
                        <option value="lab report" name="itisa">
                           Lab Report
                        </option>
                     </select>
                  </div>

                  <!-- Format ? ()-->
                  <div class="relative sm:col-span-2">
                     <label for="format" class="block mb-2 text-sm font-semibold">Format ?</label>
                     <select v-model="form.format" name="format" id="format"
                        class="block w-full px-5 py-3 mt-2 appearance-none text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg">
                        <option value="" disabled selected>
                           Select an option...
                        </option>
                        <option value="handwritten" name="format">
                           Handwritten
                        </option>
                        <option value="typed" name="format">Typed</option>
                        <option value="photo" name="format">Photo</option>
                     </select>
                  </div>

                  <div class="relative sm:col-span-2">
                     <label for="educationLevel" class="block mb-2 text-sm font-semibold">Education Level</label>
                     <select v-model="form.educationLevel" name="educationLevel" id="educationLevel"
                        class="block w-full px-5 py-3 mt-2 appearance-none text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg">
                        <option value="" disabled selected>
                           Select an option...
                        </option>
                        <option value="school">
                           School
                        </option>
                        <option value="+2">
                           +2
                        </option>
                        <option value="bachelor">
                           Bachelor
                        </option>
                        <option value="master">
                           Master
                        </option>
                        <option value="phd">
                           PhD
                        </option>
                     </select>
                  </div>


                  <!-- semester () -->
                  <div class="relative sm:col-span-2">
                     <label for="semester" class="block mb-2 text-sm font-semibold">Semester (if applicable)</label>
                     <select v-model="form.semester" name="semester" id="semester"
                        class="block w-full px-5 py-3 mt-2 appearance-none text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg">
                        <option value="" disabled selected>
                           Select an option...
                        </option>
                        <option value="first" name="semester">First</option>
                        <option value="second" name="semester">
                           Second
                        </option>
                        <option value="third" name="semester">Third</option>
                        <option value="fourth" name="semester">
                           Fourth
                        </option>
                        <option value="fifth" name="semester">Fifth</option>
                        <option value="sixth" name="semester">Sixth</option>
                        <option value="seventh" name="semester">
                           Seventh
                        </option>
                        <option value="eighth" name="semester">
                           Eighth
                        </option>
                     </select>
                  </div>

                  <!-- subject ()-->
                  <div class="sm:col-span-4">
                     <label for="subject" class="block mb-2 text-sm font-semibold">Subject</label>
                     <input required v-model="form.subject" type="text" placeholder="C Programming" name="subject"
                        id="subject"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg" />
                  </div>

                  <!-- class/faculty ()-->
                  <div class="sm:col-span-3">
                     <label for="classFaculty" class="block mb-2 text-sm font-semibold">Class/ Faculty</label>
                     <input required v-model="form.classFaculty" type="text"
                        placeholder="Bachelor in Computer Applications" name="classFaculty" id="classFaculty"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg" />
                  </div>

                  <!-- author / source / credits ()-->
                  <div class="sm:col-span-3">
                     <label for="subject" class="block mb-2 text-sm font-semibold">Author / Source / Credits [ Be
                        Truthful
                        ]</label>
                     <input required v-model="form.author" type="text" placeholder="Hakuna from YT learnWorld"
                        name="subject" id="subject"
                        class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg" />
                  </div>

                  <div class="sm:col-span-full">
                     <input required @input="form.img = $event.target.files[0]" type="file" class="" name="imageFile"
                        id="imageFile" accept="image/jpeg, image/jpg, image/png, image/gif" />
                     <p class="text-red-500 text-xs mt-2">{{ errors.img }}</p>
                  </div>

                  <div class="sm:col-span-full">
                     <input required @input="form.doc = $event.target.files[0]" type="file" class="" name="documentFile"
                        id="documentFile" accept="application/pdf" />
                     <p class="text-red-500 text-xs mt-2">{{ errors.doc }}</p>
                  </div>
                  <p class="text-red-500 text-xs mt-2" >{{ errors.message}}</p>

                  <!-- save button -->
                  <button type="submit" name="submit" class="py-3 text-center text-white bg-gray-800 rounded-lg">
                     Submit
                  </button>
               </div>
            </form>
         </div>
      </section>
   </Layout>
</template>

<script>
import Layout from '@/Shared/Layout.vue'
import { useForm } from '@inertiajs/vue3'

export default {
   components: {
      Layout,
   },
   props: {
      errors: Object,
   },
   setup() {
      // Form initialization
      const form = useForm({
         title: '',
         description: '',
         category: '',
         format: '', // Corrected typo here
         educationLevel: '',
         semester: '',
         subject: '',
         classFaculty: '',
         img: '',
         doc: '',
      })

      // Submit function
      const submit = () => {
         form.post('/material/create')
      }

      return {
         form,
         submit,
      }
   }
}
</script>
