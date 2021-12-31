<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;



class PdfController extends Controller
{
    public function download($id)
    {
        $topic = Topic::find($id);

        if (!$topic->public_media_downloadable)
            return 'Sorry, We could not find the page you were looking for.';

        $sample = [];
        $sample['title'] = $topic->title;
        $sample['research_area'] = $topic->type ? $topic->type->title : null;
        $sample['domain'] = $topic->specialization ? $topic->specialization->title : null;
        $sample['desc'] = $topic->description;
        $sample['keywords'] = $topic->tags->pluck('title');
        $sample['processing_image'] = $topic->media ? $topic->media->path : null;
        $sample['site_url'] = 'https://www.wrirk.com/';
        $sample['view_more'] =  $sample['site_url'] . 'domain/' . $topic->slug;
        if ($sample['processing_image']) {
            $path = 'storage' . $sample['processing_image'];
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $sample['processing_image'] = $base64;
        }

        // return view('topics.longdescription', compact('sample'));

        $pdf = PDF::loadView('topics.longdescription', compact('sample'));
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setPaper('a4');

        return $pdf->download('Wrirk.pdf');
    }
}
