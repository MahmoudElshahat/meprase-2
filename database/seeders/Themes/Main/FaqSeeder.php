<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Faq\Models\Faq;
use Botble\Faq\Models\FaqCategory;
use Illuminate\Support\Arr;

class FaqSeeder extends BaseSeeder
{
    public function run(): void
    {
        Faq::query()->truncate();
        FaqCategory::query()->truncate();

        $categories = [
            'Sales & Pricing',
            'Project Management',
            'Client Satisfaction',
            'Our Team',
            'Security',
            'Client Support',
        ];

        foreach ($categories as $index => $value) {
            FaqCategory::query()->create([
                'name' => $value,
                'order' => $index,
            ]);
        }

        $faqItems = [
            [
                'question' => 'Can I see a demo before purchasing your business services?',
                'answer' => 'Absolutely! We understand that seeing our services in action can be helpful. In most cases, we can provide a free demo or consultation to showcase our capabilities and ensure they align with your specific needs.',
            ],
            [
                'question' => 'What types of payment plans do you offer for your business services?',
                'answer' => 'We offer flexible payment plans to cater to different business budgets. We may offer upfront payments,  monthly installments, or project-based pricing depending on the service.  Feel free to discuss your preferred payment option with our sales team to find the best solution for you.',
            ],
            [
                'question' => 'What is the turnaround time for your business services?',
                'answer' => 'Turnaround times can vary depending on the complexity of the service and your specific needs. We will provide a clear timeline during the initial consultation or proposal stage. We also prioritize open communication and keep you updated throughout the process.',
            ],
            [
                'question' => 'Do you offer any guarantees or warranties on your business services?',
                'answer' => 'We stand behind the quality of our work and offer satisfaction guarantees on many of our services. The specific terms will be outlined in our agreement. If you have any concerns, don\'t hesitate to ask for clarification.',
            ],
            [
                'question' => 'What qualifications or certifications do your team members have?',
                'answer' => 'Our team is comprised of experienced and qualified professionals. We invest in ongoing training to ensure we stay up-to-date on the latest industry trends and best practices.  Feel free to inquire about specific credentials or expertise relevant to your needs.',
            ],
            [
                'question' => 'How do you ensure the security of my data when using your business services?',
                'answer' => 'Data security is a top priority for us. We employ robust security measures to protect your information, including secure servers, encryption protocols, and access controls. We can provide more details about our security practices upon request.',
            ],
            [
                'question' => 'Can I customize your business services to fit my specific needs?',
                'answer' => 'Yes, customization is often possible. We understand that every business is unique. We take the time to understand your requirements and tailor our services to deliver the best possible outcome for your specific situation.',
            ],
            [
                'question' => 'How can I get a quote for your business services?',
                'answer' => 'Getting a quote is easy! Simply contact us through our website, email, or phone. We will discuss your needs and provide a personalized quote based on the chosen service and its scope.',
            ],
            [
                'question' => 'What is the difference between your various business service packages?',
                'answer' => 'We offer a variety of service packages to cater to different business needs and budgets. Each package will typically include a specific set of features or deliverables.  We would be happy to explain the differences and recommend the best option for you during a consultation.',
            ],
            [
                'question' => 'Do you offer any ongoing support after I purchase your business services?',
                'answer' => 'Yes, we offer ongoing support to ensure you get the most out of our services. This may include training materials, access to a help desk, or even additional consultations depending on the service.',
            ],
        ];

        $categoryIds = FaqCategory::query()->wherePublished()->pluck('id')->toArray();

        foreach ($faqItems as $value) {
            Faq::query()->create([
                ...$value,
                'category_id' => Arr::random($categoryIds),
            ]);
        }
    }
}
