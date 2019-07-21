<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Item;

class AddFeeds extends Command
{
    /**
     * The name and signature of the console command.
     * urls is a string that separates urls by comma
     *
     * @var string
     */
    protected $signature = 'feeds:add {urls}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new feeds by command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urls = $this->argument('urls');
        $feeds = explode(',', $urls);

        //Read each feed's items
        $items = [];
        // $items = array_merge($items, $xml->xpath("//item"));
        foreach($feeds as $feed) {
            $rss = @simplexml_load_file($feed);
            $category_name = '';
            $category = new Category;

            if($rss) {
                if($rss->channel->category->__toString()) {
                    $category_name = $rss->channel->category->__toString();
                    $category = Category::createNewIfNotExists($category_name);
                }
                foreach($rss->xpath("//item") as $item) {
                    $newItem = new Item;
                    if(!$item->title) {
                        continue;
                    }
                    $newItem->title = $item->title->__toString();
                    $newItem->description = $item->description ? $item->description->__toString() : null;
                    $newItem->link = $item->link ? $item->link->__toString() : null;
                    if($category->exists) {
                        $newItem->category_id = $category->id;
                    }
                    else if($item->category) {
                        $itemCategory = Category::createNewIfNotExists($item->category->__toString());
                        $newItem->category_id = $itemCategory->id;
                    }
                    $newItem->save();
                    \Log::info("New item saved " . $newItem->created_at);
                    $this->info("New item saved " . $newItem->created_at);
                }
            }
        }
    }
}
