<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Lerova\Blog;
use Carbon\Carbon;
use Roumen\Feed\Feed;

class RSSController extends Controller
{
    public function index()
    {
        $feed = new Feed;

        $feed->setCache(60, 'rss-' . str_random(8));

        if (!$feed->isCached())
        {
            $posts = Blog::published()->orderBy('created_at', 'desc')->take(20)->get();

            $feed->title = 'smartgate AG';
            $feed->description = 'Wir kreieren Apps, die Menschen verbinden';
            $feed->logo = 'https://ucarecdn.com/8139a873-bda6-45a5-8138-208152b4f970/';
            $feed->link = route('frontend.rss.index');
            $feed->setDateFormat('datetime');

            $feed->pubdate = Carbon::now();
            $feed->lang = 'de';
            $feed->setShortening(true);
            $feed->setTextLimit(200);

            foreach ($posts as $post)
            {
                $feed->add(
                    $post->title,
                    $post->author,
                    $post->externalUrl(),
                    $post->created_at,
                    $post->teaser,
                    $post->body);
            }
        }

        return $feed->render('atom');

    }
}