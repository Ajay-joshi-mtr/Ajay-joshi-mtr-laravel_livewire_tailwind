<?php

use App\Models\Media;
use Illuminate\Database\Seeder;
use Database\Factories\ChapterFactory;

class ChapterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $chapter = ChapterFactory::new()->create([
                'title' => 'Technology',
                'description' => 'Experts are debating on this topic for years. Also, the technology covered a long way to make human life easier but the negative aspect of it can’t be ignored. Over the years technological advancement has caused a severe rise in pollution. Also, pollution has become a major cause of many health issues.',
                'topic_id' => $i,
            ]);
            $media = new Media(['name' => 'file1.zip', 'path' => '/uploads/media/file1zip_1631090393.zip', 'size' => '190', 'ext' => 'zip']);
            $chapter->media()->save($media);
        }

        for ($i = 1; $i <= 5; $i++) {
            $chapter = ChapterFactory::new()->create([
                'title' => 'Computer',
                'description' => 'The modern-day computer has become an important part of our daily life. Also, their usage has increased much fold during the last decade. Nowadays, they use the computer in every office whether private or government. Mankind is using computers for over many decades now.',
                'topic_id' => $i,
            ]);
            $media = new Media(['name' => 'file1.zip', 'path' => '/uploads/media/file1zip_1631090393.zip', 'size' => '190', 'ext' => 'zip']);
            $chapter->media()->save($media);
        }

        for ($i = 1; $i <= 5; $i++) {
            $chapter = ChapterFactory::new()->create([
                'title' => 'Wonder of Science',
                'description' => 'Looking at the age when a man led a life like a savage, we notice how far we have come. Similarly, the evolution of mankind is truly commendable. One of the major driving forces behind this is science. It makes you think about the wonder of science and how it has proven to be such a boon in our lives.',
                'topic_id' => $i,
            ]);
            $media = new Media(['name' => 'file1.zip', 'path' => '/uploads/media/file1zip_1631090393.zip', 'size' => '190', 'ext' => 'zip']);
            $chapter->media()->save($media);
        }

        for ($i = 1; $i <= 5; $i++) {
            $chapter = ChapterFactory::new()->create([
                'title' => 'Internet',
                'description' => 'We live in the age of the internet. Also, it has become an important part of our life that we can’t live without it. Besides, the internet is an invention of high-end science and modern technology. Apart from that, we are connected to internet 24×7.',
                'topic_id' => $i,
            ]);
            $media = new Media(['name' => 'file1.zip', 'path' => '/uploads/media/file1zip_1631090393.zip', 'size' => '190', 'ext' => 'zip']);
            $chapter->media()->save($media);
        }

        for ($i = 1; $i <= 5; $i++) {
            $chapter = ChapterFactory::new()->create([
                'title' => 'Science',
                'description' => 'As we look back in our ancient times we see so much development in the world. The world is full of gadgets and machinery. Machinery does everything in our surroundings. How did it get possible? How did we become so modern? It was all possible with the help of science. ',
                'topic_id' => $i,
            ]);
            $media = new Media(['name' => 'file1.zip', 'path' => '/uploads/media/file1zip_1631090393.zip', 'size' => '190', 'ext' => 'zip']);
            $chapter->media()->save($media);
        }
    }
}
