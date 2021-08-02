<?php

namespace App\Http\Controllers;

use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'reply' => 'required'
        ]);

        CommentReply::create([
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'reply' => $request->reply
        ]);

        session()->flash('success', 'Your reply has been added to the comment successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentReplies  $commentReplies
     * @return \Illuminate\Http\Response
     */
    public function show(CommentReply $commentReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentReplies  $commentReplies
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentReply $commentReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentReplies  $commentReplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentReply $commentReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentReplies  $commentReplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentReply $commentReply)
    {
        //
    }
}
