<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
    use Notes\Models\Note;

    class NotesController extends Controller
    {

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $notes = Note::withTrashed()->get();

            if ($request->wantsJson()) {
                return response()->json($notes);
            }

            $data['notes'] = $notes->all();
            return view('notes.list', $data);

        }

        /**
         * Display a listing of the resource. Modern app entry point
         *
         * @return \Illuminate\Http\Response
         */
        public function modern()
        {
            $data['notes'] = Note::withTrashed()->get()->all();
            return view('notes-vue.layout', $data);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('notes.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:128',
                'content' => 'required|string',
            ]);

            $note = Note::create($request->only(['title', 'content']));

            if ($note) {
                $message = 'Note created successfully!';
                $status = 'success';
            } else {
                $message = 'Note was not created!';
                $status = 'error';
            }

            if ($request->wantsJson()){
                return response()->json($note);
            }

            return Redirect::to('notes')
                ->with($status, $message);

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show(Request $request, $id)
        {
            $errMessage = 'Unable to find requested note';

            $toJson = $request->wantsJson();

            $idGood = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $note = Note::where('id', $idGood)->first();

            if ($toJson){

                if ($idGood){
                    return response()->json($note);
                }

                return response()->json(['error'=>$errMessage]);

            }

            if ($idGood) {
                    $data['note'] = $note;
                    return view('notes.show', $data);
            }

            return Redirect::to('notes')->with('error', $errMessage);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $where = array('id' => $id);
            $data['note'] = Note::where($where)->first();

            return view('notes.edit', $data);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $request->validate([
                'title' => 'required|string|max:128',
                'content' => 'required|string',
            ]);

            $updated = Note::where('id', $id)->update($request->only(['title', 'content']));
            $note = Note::find($id);

            if ($updated) {
                $message = 'Note updated successfully!';
                $status = 'success';
            } else {
                $message = 'Note was updated!';
                $status = 'error';
            }

            if ($request->wantsJson()){
                return response()->json($note);
            }

            return Redirect::to('notes')
                ->with($status, $message);
        }

        /**
         * Delete the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request, $id)
        {
            $message = 'Note has not been deleted!';
            $status = 'error';

            $deleted = Note::where('id', $id)->delete();

            if ($deleted) {
                $message = 'Note deleted successfully!';
                $status = 'success';
            }

            if ($request->wantsJson()){
                return $this->index($request);
            }

            return Redirect::to('notes')->with($status, $message);
        }
    }
