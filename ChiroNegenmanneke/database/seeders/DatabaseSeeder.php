<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'General'],
            ['name' => 'Technical Support'],
            ['name' => 'Billing'],
        ];

        DB::table('faq_categories')->insert($categories);

        $questions = [
            [
                'category_id' => 1, 
                'question' => 'How to reset my password?',
                'answer' => 'To reset your password, click on "Forgot password" on the login page.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'question' => 'How to troubleshoot login issues?',
                'answer' => 'Make sure you are using the correct username and password, and check your internet connection.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 3, 
                'question' => 'How to update my billing information?',
                'answer' => 'Go to the "Account settings" page and update your billing information.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('faq_questions')->insert($questions);


        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'birthday' => '1990-05-15',
                'bio' => 'I am an admin KATCHAW',
                'email' => 'admin@ehb.be',
                'password' => bcrypt('Password!321'),
                'isAdmin' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'birthday' => '1990-05-15',
                'bio' => 'A software developer from California.',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('password123'),
                'isAdmin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'birthday' => '1992-08-25',
                'bio' => 'A designer from New York.',
                'email' => 'janesmith@example.com',
                'password' => bcrypt('password123'),
                'isAdmin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);

        $contacts = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'subject' => 'Support Request',
                'message' => 'I am having issues with my account.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob@example.com',
                'subject' => 'Inquiry',
                'message' => 'Can you provide more information about your services?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('contacts')->insert($contacts);

        $news = [
            [
                'title' => 'New Feature Released',
                'image' => 'chiroBackground.jpg',
                'content' => 'We have released a new feature that improves your user experience.',
                'publication_date' => '2025-01-13',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'System Maintenance Update',
                'image' => 'chiroBackground.jpg',
                'content' => 'Our system will undergo maintenance on the 15th of January.',
                'publication_date' => '2025-01-12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('news')->insert($news);

        $settings = [
            ['key' => 'site_name', 'value' => 'My Awesome Site', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['key' => 'site_email', 'value' => 'info@myawesomesite.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('settings')->insert($settings);

        $messages = [
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'content' => 'Hello, how are you?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'content' => 'I\'m doing great, thanks for asking!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('messages')->insert($messages);

        $comments = [
            [
                'news_id' => 1,
                'user_id' => 1,
                'content' => 'Great feature, looking forward to trying it!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'news_id' => 2,
                'user_id' => 2,
                'content' => 'Thanks for the heads-up about the maintenance.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('comments')->insert($comments);

        $forumTopics = [
            [
                'title' => 'General Discussion',
                'content' => 'Let\'s talk about anything here.',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Technical Support',
                'content' => 'Ask for help with technical issues.',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('forum_topics')->insert($forumTopics);

        $forumReplies = [
            [
                'content' => 'I\'m having issues with logging in.',
                'user_id' => 2,
                'forum_topic_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'content' => 'I can help you with that.',
                'user_id' => 1,
                'forum_topic_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('forum_replies')->insert($forumReplies);

        
    }
}
