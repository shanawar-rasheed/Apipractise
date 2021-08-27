<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{

    
                         //has one Relationship
    public function insertRecord()
    {
        $phone_obj=new Phone();
        $phone_obj->phone="03026819250";

        $user_obj=new User();
        $user_obj->name="Ali";
        $user_obj->email="Ali87@gmail.com";
        $user_obj->password=encrypt("alikhan");
        $user_obj->save();

        $user_obj->phone()->save($phone_obj);
        return "Record Successfully Inserted";


    }

    public function fetchRecordById($id)
    {
        $phone=User::find($id)->phone;
        return $phone;

    }


                         //hasMany Relationship
    public function addpost()
    {
        $post_obj=new Post();
        $post_obj->title="This is 2nd post title";
        $post_obj->body="This is the body of post";
        $post_obj->save();
        return "Post Has been successfully inserted";

    }

    public function addcomment($id)
    {
        $post=Post::find($id);
        $comment_obj =new Comment();
        $comment_obj->comment="This is first comment";
        $post->comment()->save($comment_obj);
        return "Comment has been posed";
    }
    public function getCommentByPost($id)
    {
        $comments=Post::find($id)->comments;
        return $comments;
    }


    
                         //Many to ManY Relationship
}
