<?php

namespace App\Http\Controllers;

use App\Author;
use App\Content;
use App\Contact;
use App\Medio;
use App\Mediatype;
use App\Radio;
use App\Section;
use App\Tag;
use App\Typeview;
use App\Videotype;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuSections = Section::where('level', 1)
                                ->where('topnav_back', 1)
                                ->where('active', 1)->get();

        $menuLeftSections = Section::where('level', 1)
                              ->where('active', 1)->get();

        $sections = Section::all();

        $principalSections = $sections->where('level', 1)
                                      ->where('topnav_back', 1)
                                      ->where('active', 1);//->get();


        $section = $sections->where('level', 1)->first();
        $subSections = $sections->where('level', 2);
        $subSection = $sections->where('level', 2)->first();
        $contents = Content::where('section_id', $subSection->id)->orderBy('id', 'DES')->paginate(15);
        $not_responded = Contact::where('contacted', 0)->get()->count();
        return view('backend.contents.index', compact('sections', 'not_responded' , 'section', 'subSection', 'contents', 'menuSections', 'menuLeftSections'));
    }

    public function getBySection(Section $section)
    {
        $menuSections = Section::where('level', 1)
                                ->where('topnav_back', 1)
                                ->where('active', 1)->get();

        $menuLeftSections = Section::where('level', 1)
                              ->where('active', 1)->get();

        if($subSection = $section->childrens()->first()){
          $contents = $subSection->contents;
          $contents = Content::where('section_id', $subSection->id)->orderBy('id', 'DES')->paginate(15);;
        }else{
          $subSection = null;
          $contents = $section->contents()->paginate(15);
        }
        $not_responded = Contact::where('contacted', 0)->get()->count();
        return view('backend.contents.index', compact('section', 'subSection', 'not_responded' , 'contents', 'menuSections', 'menuLeftSections'));
    }

    public function getBySubSection(Section $subSection)
    {
        $menuSections = Section::where('level', 1)
                                ->where('topnav_back', 1)
                                ->where('active', 1)->get();

        $menuLeftSections = Section::where('level', 1)
                                    ->where('active', 1)->get();

        if($subSection->level == 2){
          $section = $subSection->parent;
        }elseif($subSection->level == 3){
          $section = $subSection->parent->parent;
        }
        $not_responded = Contact::where('contacted', 0)->get()->count();
        $contents = Content::where('section_id', $subSection->id)->orderBy('date', 'desc')->paginate(15);
        return view('backend.contents.index', compact('section', 'subSection', 'not_responded' , 'contents', 'menuSections', 'menuLeftSections'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBySection(Section $section)
    {
        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $menuLeftSections = Section::where('level', 1)
                                    ->where('active', 1)->get();

        $sections = Section::all();
        $videoTypes = Videotype::all();
        $typeviews = Typeview::all();
        $authors = Author::all();
        $tags = Tag::all();
        $medios = Medio::all();
        $radios = Radio::all();
        $mediaTypes = Mediatype::all();

        if($section->childrens()->count() > 0){
          $subSections = $sections->where('section_id', $section->id);
        }else{
          $subSections = null;
        }

        $not_responded = Contact::where('contacted', 0)->get()->count();
        return view('backend.contents.create', compact('section', 'not_responded' , 'sections', 'subSections',
        'typeviews', 'authors', 'menuSections', 'tags', 'videoTypes', 'menuLeftSections', 'medios', 'radios', 'mediaTypes'));

    }

    public function createBySubSection(Section $section, Section $subSection)
    {
        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $sections = Section::all();
        $videoTypes = Videotype::all();
        $subSections = $sections->where('section_id', $section->id);

        $subSubSections = "";

        if($subSection->level ==3){
          $subSubSections = $sections->where('section_id', $subSection->parent->id);
          $subSubSection = $subSection;
          $subSection = $subSection->parent;
        }

        $typeviews = Typeview::all();
        $authors = Author::all();
        $tags = Tag::all();
        $medios = Medio::all();
        $radios = Radio::all();
        $mediaTypes = Mediatype::all();

        $not_responded = Contact::where('contacted', 0)->get()->count();
        return view('backend.contents.create', compact('section', 'not_responded' , 'subSection', 'sections', 'subSections', 'radios',
        'typeviews', 'authors', 'menuSections', 'tags', 'videoTypes', 'subSubSection', 'subSubSections', 'medios', 'mediaTypes'));

    }

    public function createByTag(Section $section, Section $subSection, Tag $tagId){
      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $sections = Section::all();
      $videoTypes = Videotype::all();
      $subSections = $sections->where('section_id', $section->id);

      $subSubSections = "";

      if($subSection->level ==3){
        $subSubSections = $sections->where('section_id', $subSection->parent->id);
        $subSubSection = $subSection;
        $subSection = $subSection->parent;
      }

      $typeviews = Typeview::all();
      $authors = Author::all();
      $tags = Tag::all();
      $medios = Medio::all();
      $radios = Radio::all();
      $mediaTypes = Mediatype::all();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.contents.create', compact('section', 'not_responded' , 'subSection', 'sections', 'subSections', 'radios',
      'typeviews', 'authors', 'menuSections', 'tags', 'tagId', 'videoTypes', 'subSubSection', 'subSubSections', 'medios', 'mediaTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Store del contenido
      $content = new Content($request->except('tags','url', 'img', 'secondSection'));

      //Saco los acentos de url y lo guardo en content
      $string = trim($request->input('url'));
      $url = str_replace(
        array('á', 'é', 'í', 'ó', 'ú'),
        array('a', 'e', 'i', 'o', 'u'),
        $string
      );
      $content->url = $url;

      //Subiendo las imagenes y haciendo resize
      if($request->input('typeview_id') == 3){
        $path = 'img/articulos/';
        $contentName = 'Artículo';
      }elseif($request->input('typeview_id') == 4){
        $path = 'img/programas/';
        $contentName = 'Programa';
      }elseif($request->input('typeview_id') == 5){
        $path = 'img/radio/';
        $contentName = 'Radio';
      }elseif($request->input('typeview_id') == 6){
        $path = 'img/medios/';
        $contentName = 'Medios';
      }elseif($request->input('typeview_id') == 9){
        $path = 'img/libros/';
        $contentName = 'Libro';
      }elseif($request->input('typeview_id') == 11){
        $path = 'img/PSR-en-accion/';
        $contentName = 'PSR-en-accion';
      }
      elseif($request->input('typeview_id') == 14){
        $path = 'img/videos-cortos/';
        $contentName = 'Video-corto';
      }


      //Redimensiono y Guardo las Imágenes (Si la imágene se cargo)
      if($request->file('img')){
        $file = $request->file('img');
    		$name = $url.'.'.$file->getClientOriginalExtension();
        $imageFile = Image::make($request->file('img'));
        $imageFile->save($path.'standard/'.$name);
        $imageMedium = $imageFile->resize(750, 422);
        $imageMedium->save($path.'medium/'.$name);
        $imageSmall = $imageFile->resize(320, 180);
        $imageSmall->save($path.'small/'.$name);
        $content->img_url = $name;
      }else if($content->section_id == 30 || $content->section_id == 46){///radio zonica, psr en accion temporada 17
        $name = $url.'.jpg';
        $ytimg = 'http://img.youtube.com/vi/'.$content->video_id.'/maxresdefault.jpg';
        $file_headers = @get_headers($ytimg);
        $exists = (!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') ?false:true;
        if($exists){
          $imageFile = Image::make($ytimg);
          $imageFile->save($path.'standard/'.$name);
          $imageMedium = $imageFile->resize(750, 422);
          $imageMedium->save($path.'medium/'.$name);
          $imageSmall = $imageFile->resize(320, 180);
          $imageSmall->save($path.'small/'.$name);
          $content->img_url = $name;
        }
      }

      $content->user_id = Auth::user()->id;

      $content->filter_id = $request->input('filter_id');

      $content->save();

      // dd($content);

      //Guardando Tags asociados
      $content->tags()->sync($request->input('tags'), false);

      //Cargando los datos de la vista
      $menuSections = Section::where('level', 1)->where('topnav_back', 1)->where('active', 1)->get();

      // dd($content->section_id);

      if($content->section->level == 2){
        $subSection = $content->section;
        $section = $subSection->parent;
        $sections = $section->getSubSections();
        $redirect = '/backend/contents/createBySection/'.$section->id.'/'.$subSection->id;
      }else{
        $subSection = null;
        $sections = null;
        $redirect = '/backend/contents/createBySection/'.$content->section_id;

      }

      $not_responded = Contact::where('contacted', 0)->get()->count();

      //Mensaje
      $message = 'El contenido se ha sido creado correctamente!.';
      return redirect($redirect)->with('message', $message);
      // return view('backend.contents.show', compact('content', 'sections', 'section', 'subSection', 'menuSections', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      if( $content->section->level == 2){
        $subSection = $content->section;
        $section = $subSection->parent;
      }else{
        $subSection = null;
        $section = $content->section;
      }

      $sections = $section->getSubSections();
      $not_responded = Contact::where('contacted', 0)->get()->count();

      return view('backend.contents.show', compact('content', 'not_responded' , 'not_responded', 'sections', 'section', 'subSection', 'menuSections'));
    }

    public function getContentBySubSection(Section $subSection){
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $content = $subSection->contents()->first();
      $section = $subSection->parent;
      $sections = $section->getSubSections();
      $not_responded = Contact::where('contacted', 0)->get()->count();

      return view('backend.contents.show', compact('content', 'not_responded' , 'not_responded', 'sections', 'section', 'subSection', 'menuSections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $sections = Section::all();

      // dd($content->section);

      if($content->section->level == 1){
        $section = $content->section;
        $subSection = null;
        $subSubSections = null;
      }else{
        $section = $content->section->parent;
        $subSection = $content->section;
        $subSubSection = "";
      }



      $subSections = $sections->where('section_id', $section->id);
      $videoTypes = Videotype::all();
      $typeviews = Typeview::all();
      $authors = Author::all();
      $medios = Medio::all();
      $tags = Tag::all();
      $radios = Radio::all();
      $mediaTypes = Mediatype::all();

      $not_responded = Contact::where('contacted', 0)->get()->count();

      return view('backend.contents.edit', compact('section', 'not_responded' , 'not_responded', 'subSection', 'mediaTypes', 'medios', 'subSubSection', 'content', 'sections', 'subSections',
      'typeviews', 'authors', 'menuSections', 'tags', 'subSubSections', 'videoTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $content->update($request->except('tags','url', 'img', 'secondSection'));

        //Saco los acentos de url y lo guardo en content
        $string = trim($request->input('url'));
        $url = str_replace(
          array('á', 'é', 'í', 'ó', 'ú'),
          array('a', 'e', 'i', 'o', 'u'),
          $string
        );
        $content->url = $url;

        if($request->input('active')){
          $content->active = 1;
        }else{
          $content->active = 0;
        }

        if($request->input('dest')){
          $content->dest = 1;
        }else{
          $content->dest = 0;
        }

        $content->editors()->save(Auth::user());

        $content->save();

        //Guardando Tags asociados
        $content->tags()->sync($request->input('tags'));

        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $sections = Section::all();

        if($content->section->level == 1){
          $section = $content->section;
          $subSection = null;
          $subSubSection = null;
          $subSubSections = null;
        }else{
          $section = $content->section->parent;
          $subSection = $content->section;
          $subSubSection = "";
        }

        $subSections = $sections->where('section_id', $section->id);

        $videoTypes = Videotype::all();
        $typeviews = Typeview::all();
        $authors = Author::all();
        $medios = Medio::all();
        $tags = Tag::all();
        $mediaTypes = Mediatype::all();

        $message = "El ".$content->typeview->name." se ha modificado correctamente.";
        $not_responded = Contact::where('contacted', 0)->get()->count();

        return view('backend.contents.edit', compact('section', 'not_responded' , 'subSection', 'not_responded', 'medios', 'subSubSection', 'content', 'sections', 'subSections',
        'typeviews', 'authors', 'menuSections', 'tags', 'videoTypes', 'subSubSections', 'mediaTypes', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
      $typeView = $content->typeview->name;
      $subSection = $content->section;
      $content->delete();

      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $sections = Section::all();

      $principalSections = $sections->where('level', 1)
                                    ->where('topnav_back', 1)
                                    ->where('active', 1);//->get();


      $section = $sections->where('level', 1)->first();
      $subSections = $sections->where('level', 2);
      $subSection = $sections->where('level', 2)->first();
      $contents = Content::where('section_id', $subSection->id)->paginate(15);

      $message = 'El contenido ha sido eliminado.';
      $not_responded = Contact::where('contacted', 0)->get()->count();

      return view('backend.contents.index', compact('sections', 'not_responded' , 'section', 'not_responded', 'subSection', 'contents', 'message', 'menuSections', 'menuLeftSections'));
    }

    public function addNewTag($name){
      $url = str_replace(
        array('á', 'é', 'í', 'ó', 'ú', ' '),
        array('a', 'e', 'i', 'o', 'u', '-'),
        $name
      );
      $url = strtolower($url);

      $tag = new Tag([
        'name' => $name,
        'url' => $url
      ]);

      $tag->save();
      $id = $tag->id;

      return response()->json([
        'id' => $id,
        'name' => $name
      ]);
    }

    public function editImage(Request $request, Content $content){

      if($content->typeview_id == 3){
        $path = 'img/articulos/';
      }elseif($content->typeview_id == 4){
        $path = 'img/programas/';
      }elseif($content->typeview_id == 5){
        $path = 'img/radio/';
        $contentName = 'Radio';
      }elseif($content->typeview_id == 6){
        $path = 'img/medios/';
        $contentName = 'Medios';
      }elseif($content->typeview_id == 9){
        $path = 'img/libros/';
        $contentName = 'Libro';
      }elseif($content->typeview_id == 11){
        $path = 'img/PSR-en-accion/';
        $contentName = 'PSR-en-accion';
      }

      $file = $request->file('file');
      $name = $content->url.'.'.$file->getClientOriginalExtension();
      $imageFile = Image::make($file);
      $imageFile->save($path.'standard/'.$name);
      $imageMedium = $imageFile->resize(750, 422);
      $imageMedium->save($path.'medium/'.$name);
      $imageSmall = $imageFile->resize(320, 180);
      $imageSmall->save($path.'small/'.$name);
      $content->img_url = $name;
      $content->save();
    }
}
