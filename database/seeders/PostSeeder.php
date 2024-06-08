<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $init = [
            0 => [
                    "id" => 1,
                    "title" => "Notion",
                    "author" => "Marcia Thiel",
                    "content" => "Sed soluta nemo et consectetur reprehenderit ea reprehenderit sit. Aut voluptate sit omnis qui repudiandae. Cum sit provident eligendi tenetur facere ut quo. Commodi voluptate ut aut deleniti.",
                    "tags" => json_encode([
                        "organization",
                        "planning",
                        "collaboration",
                        "writing",
                        "calendar"
                    ])
                ],
            1 => [
                    "id" => 2,
                    "title" => "json-server",
                    "author" => "Eldora Schinner",
                    "content" => "Laudantium illum modi tenetur possimus natus. Sed tempora molestiae fugiat id dolor rem ea aliquam. Ipsam quibusdam quam consequuntur. Quis aliquid non enim voluptatem nobis. Error nostrum assumenda ullam error eveniet. Ut molestiae sit non suscipit.\nQui et eveniet vel. Tenetur nobis alias dicta est aut quas itaque non. Omnis iusto architecto commodi molestiae est sit vel modi. Necessitatibus voluptate accusamus.",
                    "tags" => json_encode([
                        "api",
                        "json",
                        "schema",
                        "node",
                        "github",
                        "rest"
                ])
            ],
            2 => [
                    "id" => 3,
                    "title" => "fastify",
                    "author" => "Delpha Balistreri",
                    "content" => "Eos corrupti qui omnis error repellendus commodi praesentium necessitatibus alias. Omnis omnis in. Labore aut ea minus cumque molestias aut autem ullam. Consectetur et labore odio quae eos eligendi sit. Quam placeat repellendus.\n Odio nisi dolores dolorem ea. Qui dicta nulla eos quidem iusto. Voluptatibus qui est accusamus sint perferendis est quae recusandae. Qui repudiandae cupiditate fugiat est.",
                    "tags" => json_encode([
                        "web",
                        "framework",
                        "node",
                        "http2",
                        "https",
                        "localhost"
                    ])

                ]
        ];
        DB::table('posts')->insert($init);
    }
}
