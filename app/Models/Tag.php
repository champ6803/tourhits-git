<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tag';

    public function getTagAll() {
        try {
            $tagList = Tag::all();
            return $tagList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTagByName($input_tag_name) {
        try {
            $tagList = Tag::where('tag_name', $input_tag_name)->get();
            return $tagList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertTag($tag_name, $tag_url) {
        try {
            $date = \Carbon\Carbon::now();
            Tag::insert(
                    ['tag_name' => $tag_name
                        , 'tag_url' => $tag_url
                        , 'created_by' => 'admin'
                        , 'created_at' => $date
                        , 'updated_by' => 'admin'
                        , 'updated_at' => $date]
            );
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeTag($id) {
        try {
            Tag::where('tag_id', $id)->delete();
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function editTag($id, $update_tag_name, $update_tag_url) {
        try {
            $date = \Carbon\Carbon::now();
            Tag::where('tag_id', $id)
                    ->update(['tag_name' => $update_tag_name
                        , 'tag_url' => $update_tag_url
                        , 'updated_at' => $date
                        , 'updated_by' => 'admin']);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTagByUrl($url) {
        try {
            $tagList = null;
            if ($url != null && $url != "") {
                $tagList = Tag::where('tag.tag_url', $url)
                        ->get();
            }
            return $tagList;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}
