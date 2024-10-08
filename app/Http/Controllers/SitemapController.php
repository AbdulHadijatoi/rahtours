<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Models\Activity;
use App\Models\Blog;
use App\Models\Category;
use App\Repositories\User\ActivityRepository;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller {

    public function generateSitemap()
    {
        $blogs = Blog::get(['id', 'slug', 'updated_at']);
        $activities = Activity::with(['category'])->get(['id', 'category_id', 'slug', 'updated_at']);
        $categories = Category::get(['id', 'slug', 'name', 'updated_at']);
        
        // Start building the XML sitemap
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
        
        // Static routes
        $xml .= $this->staticRoutes();
        
        // Dynamic blog routes
        foreach ($blogs as $blog) {
            $xml .= '
            <url>
                <loc>https://rahtours.ae/blogs/' . $blog->slug . '</loc>
                <lastmod>' . $blog->updated_at->format('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>';
        }

        // Dynamic categories routes
        foreach ($categories as $category) {
            $xml .= '
            <url>
                <loc>https://rahtours.ae/dubai-activities/' . $category->slug . '</loc>
                <lastmod>' . $category->updated_at->format('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>';
        }
        
        // Dynamic activities routes
        foreach ($activities as $activity) {
            $xml .= '
            <url>
                <loc>https://rahtours.ae/dubai-activities/' . $activity->category->slug . '/' . $activity->slug . '</loc>
                <lastmod>' . $activity->updated_at->format('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>';
        }
        
        // Close the XML sitemap
        $xml .= '</urlset>';
        
        // Define the file path in the public directory
        $sitemapPath = public_path('sitemap.xml');
        
        // Save the XML content to the file in the public directory
        try {
            file_put_contents($sitemapPath, $xml);
            return response()->json(['message' => 'Sitemap generated successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate sitemap: ' . $e->getMessage()], 500);
        }
    }

    public function staticRoutes(){
        return '
            <url>
                <loc>https://rahtours.ae/</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>1.0</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/signup</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/login</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/manage-profile</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/forgot-password</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/otp-verfication</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/send-reset-link</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/guest-details</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/about</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/invoice-details</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/search-result</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/desert-safari</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/privacy-policy</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/confirmation</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/booking-info</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/contact-us</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/blogs</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/help</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/where-to-find-us</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/payment-details</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/admin-login</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/whish-list</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/cart</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/history</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/all-booking</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/terms-and-conditions</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
            <url>
                <loc>https://rahtours.ae/view-gift</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.7</priority>
            </url>
        ';
    }

}