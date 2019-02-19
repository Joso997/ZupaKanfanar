<?php

namespace Župa\Http\Controllers;

use PHPHtmlParser\Dom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AjaxController extends Controller
{

    function galerija(){
        $dirname = "/slike/";
        $dirname_ruzareva = "/slike/ruzareva/";
        $path = public_path();
        $files = glob($path.$dirname."*.jpg");
        $files_ruzareva = glob($path.$dirname_ruzareva."*.jpg");
        $images = array("main" => array() , "ruzareva2017" => array());
        for ($i = 0; $i < count($files); $i++) {
            $image = $files[$i];
            array_push($images["main"], basename($image));
        }
        for ($i = 0; $i < count($files_ruzareva); $i++) {
            $image = $files_ruzareva[$i];
            array_push($images["ruzareva2017"], basename($image));

        }
        return $images;
    }

    public function spremiKalendar(Request $request){
        $tekst = $request->tekst;
        $response = array(
            'status' => 'success',
            'msg' => AjaxController::generate_pdf()
        );
        if(!empty($tekst)){
            $data = $tekst;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $fname = $randomString . ".html";//generates random name

            $file = fopen("files/" .$fname, 'w');//creates new file
            fwrite($file, $data);
            fclose($file);
        }
        return response()->json($response);
    }

    function generate_pdf()
    {
        return "hello";
    }

    function raspored(){
        $dirname = "/files/";
        $path = public_path();
        $files = glob($path.$dirname."*.{html,htm}", GLOB_BRACE);
        $filename = "";
        $lastfiletime = 0;
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if(filemtime('files/'.basename($file)) > $lastfiletime){
                $lastfiletime = filemtime('files/'.basename($file));
                $filename = basename($file);
            }

        }

        // Assuming you installed from Composer:

        $dom = new Dom;
        $dom->loadFromFile('files/'.$filename);
        $contents = $dom->find('div');

        /*foreach ($contents as $content)
        {
             get the class attr
            $class = $content->getAttribute('class');

             do something with the html
            $html = $content->innerHtml;

             or refine the find some more
            $child   = $content->firstChild();
            $sibling = $child->nextSibling();
        }
        $html = new \Htmldom('http://zupa-sv-silvestra-kanfanar.hr');
        $html = \HTMLDomParser::str_get_html($dom);
        $html = HtmlDomParser::file_get_html('files/obavijesti_2.htm');
        $elems = $html->find('p');
        $elems = $html->find('div', 1)->class = 'WordSection1';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://zupa-sv-silvestra-kanfanar.hr/public/files/obavijesti_1.html');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        $str = curl_exec($curl);
        curl_close($curl);

        $html = file_get_contents('files/'.$filename);
        $html= str_get_html($html);
        $html = new \Htmldom('files/'.$filename);
        $html->find('div', 1)->class = 'WordSection1';

                $dom = new \DOMDocument();

                $dom->loadHTMLFile("files/obavijesti_1.html");

                $xpath = new \DOMXPath($dom);
                $divContent = $xpath->query("//div[@class='WordSection1']");

        return $divContent->item(0)->nodeValue;*/
        return $contents;
    }

}
