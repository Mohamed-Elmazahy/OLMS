<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [

            [
                'title' => 'PHP and MySQL Web Development',
                'author' => 'Luke Welling',
                'description' => 'A comprehensive guide to building dynamic, data-driven web applications using PHP and MySQL.',
                'quantity' => 10,
            ],
            [
                'title' => 'PHP for the Web',
                'author' => 'Larry Ullman',
                'description' => 'A practical, step-by-step guide to learning PHP for web development.',
                'quantity' => 15,
            ],
            [
                'title' => 'Web Application Serity',
                'author' => 'Joel Scambray',
                'description' => 'An introduction to web application security, covering common vulnerabilities and best practices.',
                'quantity' => 8,
            ],
            [
                'title' => 'The Web Application Hacker\'s Handbook',
                'author' => 'Dafydd Stuttard',
                'description' => 'A comprehensive guide to finding and exploiting security flaws in web applications.',
                'quantity' => 12,
            ],
            [
                'title' => 'SQL and Relational Theory',
                'author' => 'C.J. Date',
                'description' => 'A deep understanding of SQL and relational theory, helping you write accurate and efficient SQL code.',
                'quantity' => 7,
            ],
            [
                'title' => 'Learning SQL',
                'author' => 'Alan Beaulieu',
                'description' => 'Beginner-friendly guide to learning SQL, covering the basics and advanced topics.',
                'quantity' => 20,
            ],
            [
                'title' => 'Design and Build Websites',
                'author' => 'Jon Duckett',
                'description' => 'A beautifully designed and easy-to-follow guide to HTML and CSS, perfect for beginners.',
                'quantity' => 15,
            ],
            [
                'title' => 'A Modern Introduction to Programming',
                'author' => 'Marijn Haverbeke',
                'description' => 'A modern introduction to JavaScript programming, covering the language and its applications.',
                'quantity' => 10,
            ],
            [
                'title' => 'Better Solutions to Everyday Web Design Problems',
                'author' => 'Lea Verou',
                'description' => 'It offers practical solutions and advanced techniques for common CSS problems, helping you create better web designs.',
                'quantity' => 8,
            ],
            [
                'title' => 'The Good Parts',
                'author' => 'Douglas Crockford',
                'description' => 'It focuses on the good parts of JavaScript, providing a concise and powerful guide to the language.',
                'quantity' => 12,
            ],
            [
                'title' => 'Responsive Web Design with HTML5 and CSS3',
                'author' => 'Ben Frain',
                'description' => 'This book covers responsive web design using HTML5 and CSS3, helping you create flexible and adaptive web layouts.',
                'quantity' => 18,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}