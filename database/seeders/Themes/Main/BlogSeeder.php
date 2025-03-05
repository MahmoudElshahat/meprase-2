<?php

namespace Database\Seeders\Themes\Main;

use Botble\ACL\Models\User;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Database\Traits\HasBlogSeeder;
use Botble\Shortcode\Facades\Shortcode;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class BlogSeeder extends BaseSeeder
{
    use HasBlogSeeder;

    public function run(): void
    {
        $this->createPosts();
    }

    public function createPosts(): void
    {
        $this->uploadFiles('news');

        $this->createBlogCategories($this->getBlogCategoryData());

        $this->createBlogTags($this->getBlogTagData());

        $faker = $this->fake();
        $data = $this->getData();

        $content = str_replace([
            '[content-quote]',
            '[content-featured]',
        ], [
            Shortcode::generateShortcode('content-quote', [
                'content_text' => '“ Urabitur Varius Eros Rutrum Consequat Mauris Aewa Sollicitudin Enim Condimentum Luctus Enim Justo Non Molestie Nisl ”',
                'background_color' => '#F8FAFF',
            ]),
            Shortcode::generateShortcode('content-featured', [
                'title' => 'Raise Capital Faster & Negotiate On Your Own Terms',
                'description' => 'Accelerate your business growth and secure funding with confidence through our comprehensive services tailored to meet your needs.',
                'image' => $this->filePath('general/content-featured.jpg'),
                'quantity' => 3,
                'title_1' => 'Business Growth',
                'title_2' => 'Analysis & Research',
                'title_3' => '100% Secure',
            ]),
        ], File::get(database_path('seeders/contents/post.html')));

        $users = User::query()->pluck('id')->all();

        foreach ($data as $index => $item) {
            $data[$index] = [
                ...$item,
                'content' => $content,
                'author_type' => User::class,
                'author_id' => Arr::random($users),
                'views' => $faker->numberBetween(100, 2500),
                'is_featured' => $index < 10,
                'image' => $this->filePath('news/' . ($index + 1) . '.jpg'),
            ];
        }

        $this->createBlogPosts($data);
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'The Power of Networking: Building Relationships for Business Growth',
                'description' => 'Learn how to build strategic connections and leverage your network to propel your business forward.',
            ],
            [
                'name' => '5 Productivity Hacks for Busy Entrepreneurs',
                'description' => 'Feeling overwhelmed? Discover practical tips to maximize your time and achieve more in your workday.',
            ],
            [
                'name' => 'From Brainstorm to Boardroom: Crafting a Winning Business Plan',
                'description' => 'Unleash your inner strategist. This post outlines the key elements of a compelling business plan.',
            ],
            [
                'name' => 'The Art of Delegation: Empowering Your Team for Success',
                'description' => "Effective leaders empower others. Learn how to delegate tasks effectively and unlock your team's full potential.",
            ],
            [
                'name' => 'Customer Centricity: Putting Your Customers at the Heart of Your Business',
                'description' => "In today's competitive market, customer satisfaction is paramount. Discover strategies to prioritize your customers.",
            ],
            [
                'name' => 'Data-Driven Decisions: Leveraging Insights to Fuel Business Growth',
                'description' => 'Data is king. Learn how to harness the power of data analytics to make informed decisions for your business.',
            ],
            [
                'name' => 'Building a Strong Brand Identity: Standing Out from the Crowd',
                'description' => 'Create a brand that resonates with your audience. Explore strategies to develop a unique and memorable brand identity.',
            ],
            [
                'name' => 'The Importance of Social Media Marketing for Businesses',
                'description' => 'Reach a wider audience and engage with potential customers. Discover the power of social media marketing for businesses.',
            ],
            [
                'name' => 'Content is King: Creating Engaging Content to Attract Customers',
                'description' => 'High-quality content is key to attracting and retaining customers. Explore strategies to create valuable and engaging content.',
            ],
            [
                'name' => 'The Art of Negotiation: Winning Deals and Building Relationships',
                'description' => 'Master the art of negotiation and achieve mutually beneficial outcomes. Learn effective negotiation strategies for business.',
            ],
            [
                'name' => 'Managing Cash Flow: The Lifeblood of Your Business',
                'description' => 'Cash flow is crucial for any business. Explore strategies to manage your cash flow effectively and ensure financial stability.',
            ],
            [
                'name' => 'The Power of Storytelling: Connecting with Your Audience on a Deeper Level',
                'description' => 'Stories have the power to inspire and connect. Learn how storytelling can enhance your marketing and brand communication.',
            ],
            [
                'name' => 'Overcoming Challenges: Embracing Failure as a Learning Opportunity',
                'description' => 'Challenges are inevitable in business. Discover how to overcome obstacles and use setbacks as fuel for growth.',
            ],
            [
                'name' => 'Building a High-Performing Team: Creating a Culture of Collaboration and Success',
                'description' => 'The strength of a business lies in its people. Explore strategies to foster a collaborative and successful team environment.',
            ],
            [
                'name' => 'The Importance of Work-Life Balance for Entrepreneurs',
                'description' => 'Burnout is real. Learn how to maintain a healthy work-life balance for long-term success as an entrepreneur.',
            ],
            [
                'name' => 'Staying Ahead of the Curve: Embracing Innovation in Business',
                'description' => 'In a rapidly changing world, innovation is key. Learn strategies to stay ahead of the curve and adapt to industry trends.',
            ],
            [
                'name' => 'The Power of Public Speaking: Captivate Your Audience and Deliver Your Message with Impact',
                'description' => 'Master the art of public speaking to elevate your presentations and connect with your audience effectively.',
            ],
            [
                'name' => 'Building a Sustainable Business: Environmental and Social Responsibility',
                'description' => "Today's consumers are conscious. Learn how to build a sustainable business model that prioritizes social responsibility.",
            ],
            [
                'name' => 'The Future of Business: Trends and Technologies Shaping the Landscape',
                'description' => "Explore emerging trends and technologies that are shaping the future of business. Prepare your business for what's to come.",
            ],
        ];
    }

    protected function getBlogCategoryData(): array
    {
        return [
            ['name' => 'Entrepreneurship'],
            ['name' => 'Startups'],
            ['name' => 'Marketing'],
            ['name' => 'Sales'],
            ['name' => 'Finance'],
            ['name' => 'Leadership'],
            ['name' => 'Management'],
            ['name' => 'Human Resources'],
            ['name' => 'Customer Service'],
            ['name' => 'Innovation'],
            ['name' => 'Business Strategy'],
            ['name' => 'E-commerce'],
            ['name' => 'Technology'],
            ['name' => 'Networking'],
            ['name' => 'Productivity'],
            ['name' => 'Operations'],
            ['name' => 'Legal'],
            ['name' => 'Industry Trends'],
            ['name' => 'Small Business'],
            ['name' => 'Consulting'],
        ];
    }

    protected function getBlogTagData(): array
    {
        return [
            ['name' => 'Growth'],
            ['name' => 'Strategy'],
            ['name' => 'Innovation'],
            ['name' => 'Leadership'],
            ['name' => 'Funding'],
            ['name' => 'Marketing'],
            ['name' => 'Sales'],
            ['name' => 'SEO'],
            ['name' => 'Branding'],
            ['name' => 'Customer Service'],
            ['name' => 'Productivity'],
            ['name' => 'Networking'],
            ['name' => 'Startups'],
            ['name' => 'E-commerce'],
            ['name' => 'Finance'],
            ['name' => 'Business Development'],
            ['name' => 'Team Building'],
            ['name' => 'Operations'],
            ['name' => 'Legal Advice'],
            ['name' => 'HR Management'],
        ];
    }
}
