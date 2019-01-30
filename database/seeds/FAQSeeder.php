<?php

use Illuminate\Database\Seeder;
use App\Theme;
use App\Question;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_questions = [
            'Basics' => [
                'How do I change my password?',
                'How do I sign up?',
                'Can I remove a post?',
                'How do reviews work?',
            ],

            'Mobile' => [
                'How does syncing work?',
                'How do I upload files from my phone or tablet?',
                'How do I link to a file or folder?',
            ],

            'Account' => [
                'How do I change my password?',
                'How do I delete my account?',
                'How do I change my account settings?',
                'I forgot my password. How do I reset it?',
            ],

            'Payments' => [
                'Can I have an invoice for my subscription?',
                'Why did my credit card or PayPal payment fail?',
                'Why does my bank statement show multiple charges for one upgrade?',
            ],

            'Privacy' => [
                'Can I specify my own private key?',
                'My files are missing! How do I get them back?',
                'How can I access my account data?',
                'How can I control if other search engines can link to my profile?',
            ],

            'Delivery' => [
                'What should I do if my order hasn\'t been delivered yet?',
                'How can I find your international delivery information?',
                'Who takes care of shipping?',
                'How do returns or refunds work?',
                'How do I use shipping profiles?',
                'How does your UK Next Day Delivery service work?',
                'How does your Next Day Delivery service work?',
                'When will my order arrive?',
                'When will my order ship?',
            ],
        ];

        $answer = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.';

        foreach ($all_questions as $theme => $questions) {

            $new_questions = [];
            $new_theme = Theme::create([
                'name' => $theme,
            ]);

            foreach ($questions as $question) {

                $new_questions[] = $new_question = new Question([
                    'text' => $question,
                    'answer' => $answer,
                    'author' => 'MR FAQ',
                    'email' => 'mr@faq.com',
                    'published' => TRUE,
                ]);
            }

            $new_theme->questions()->saveMany($new_questions);
        }
    }
}
