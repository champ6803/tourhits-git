<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_Detail;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Country_Article;
use App\Models\Tour_Country;
use Illuminate\Support\Facades\Input as Input;

/**
 * Description of ArticleIndexController
 *
 * @author green
 */
class ArticleIndexController extends Controller {

    public function article_index() {
        $articleModel = new Article();
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        $articleList = $articleModel->getArticleAll();
        return view('article.article-index', compact('articleList', 'countryList'));
    }

    public function article_content(Request $request) {
        $id = $request->query('id');
        $articleDetailModel = new Article_Detail();
        $countryModel = new Country();
        $countryList = $countryModel->getCountryAll();
        $articleDetailList = $articleDetailModel->getArticleDetailByArticleID($id);
        $articleDetailList[0]->article_image = str_replace(" ", "%20", $articleDetailList[0]->article_image);

        $articleModel = new Article();
        $articleList = $articleModel->getArticleAll();

        return view('article.article-content', compact('articleDetailList', 'articleList', 'countryList'));
    }

    public function article_manage() {
        return view('article.article-manage');
    }

    public function country_article_manage() {
        return view('article.country-article-manage');
    }

    public function country_article_manage_action() {
        $tour_country_model = new Tour_Country();
        $tourCountryList = $tour_country_model->getTourCountryAll();
        return view('article.country-article-manage-action', compact('tourCountryList'));
    }

    public function article_manage_action() {
        return view('article.article-manage-action');
    }

    public function searchArticle() {
        $articleDetailModel = new Article_Detail();
        try {
            $input_article_title = $_POST['article_title'];
            $articleDetailList = $articleDetailModel->getArticleDetailAll();
            return response($articleDetailList);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function searchCountryArticle() {
        $countryArticleModel = new Country_Article();
        try {
            $input_article_name = $_POST['country_article_name'];
            $countryArticleModel = $countryArticleModel->getCountryArticleAll();
            return response($countryArticleModel);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveArticle(Request $request) {
        $articleDetailModel = new Article_Detail();
        try {
            $article_id = $request->get('article_id');
            if ($this->IsNullOrEmptyString($article_id)) {
                $article_title = $request->get('article_title');
                $article_image = $_FILES['image']['name'];
                $article_short_detail = $request->get('article_short_detail');
                $article_detail_name = $request->get('article_detail_name');

                $articleDetailModel->insertArticle($article_title, $article_short_detail, $article_detail_name, $article_image);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='article-manage';
                        </script>";
            } else {
                $article_title = $request->get('article_title');
                $article_image = $_FILES['image']['name'];
                $article_short_detail = $request->get('article_short_detail');
                $article_detail_name = $request->get('article_detail_name');

                $articleDetailModel->updateArticle($article_id, $article_title, $article_short_detail, $article_detail_name, $article_image);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='article-manage';
                        </script>";
            }
            echo "<script>
                        alert('ไม่สามารถบันทึกได้');
                        window.location.href='article-manage';
                        </script>";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            dd($msg);
        }
    }

    public function getArticleById(Request $request) {
        $articleDetailModel = new Article_Detail();
        try {
            $article_id = $request->get('article_id');
            $result = $articleDetailModel->getArticleDetailByArticleID($article_id);
            return response($result);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function removeArticle() {
        $articleDetailModel = new Article_Detail();
        try {
            $article_id = $_POST['id'];
            $articleDetailModel->removeArticle($article_id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function getCountryArticleById(Request $request) {
        $countryArticleModel = new Country_Article();
        try {
            $country_article_id = $request->get('country_article_id');
            $result = $countryArticleModel->getCountryArticleByID($country_article_id);
            return response($result);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function removeCountryArticle() {
        $countryArticleModel = new Country_Article();
        try {
            $country_article_id = $_POST['id'];
            $countryArticleModel->removeCountryArticle($country_article_id);
            return response('success');
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
    }

    public function saveCountryArticle(Request $request) {
        $countryArticleModel = new Country_Article();
        try {
            $country_article_id = $request->get('country_article_id');
            if ($this->IsNullOrEmptyString($country_article_id)) {
                $tour_country_id = $request->get('tour_country_id');
                $country_article_name = $request->get('country_article_name');
                $country_article_detail = $request->get('country_article_detail');
                $countryArticleModel->insertCountryArticle($country_article_name, $country_article_detail, $tour_country_id);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='country-article-manage';
                        </script>";
            } else {
                $tour_country_id = $request->get('tour_country_id');
                $country_article_name = $request->get('country_article_name');
                $country_article_detail = $request->get('country_article_detail');
                $countryArticleModel->updateCountryArticle($country_article_id, $country_article_name, $country_article_detail, $tour_country_id);
                echo "<script>
                        alert('บันทึกเรียบร้อย');
                        window.location.href='country-article-manage';
                        </script>";
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            dd($msg);
            echo "<script>
                        alert('ไม่สามารถบันทึกได้');
                        window.location.href='country-article-manage';
                        </script>";
        }
    }

    public function attachableImages() {
        try {
            $IMAGEPATH = 'images/article-img-detail/';
            $imagArr = [];
            foreach (glob($IMAGEPATH . '*') as $filename) {
                array_push($imagArr, (object) [
                            'file' => $filename,
                            'caption' => basename($filename)
                ]);
            }
            return response()->json($imagArr);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            dd($msg);
        }
    }

    public function uploadImage() {
        if (rand(0, 3) > 0) {
            $filename = basename($_FILES['file']['name']);
            $name = time().$filename;
            if (Input::hasFile('file')) {
                $file = Input::file('file');
                $file->move('images/article-img-detail', $name);
            }

            //move_uploaded_file($_FILES['file']['name'].date('Y-m-dH:i:s'), 'images/article-img-detail/'.$filename);

            $data = array('status' => 1,
                'file' => 'images/article-img-detail/'.$name,
                'caption' => $name);
        } else {
            $data = array('status' => 0);
        }

        header('Content-type: text/html');
        echo json_encode($data);
    }

}
