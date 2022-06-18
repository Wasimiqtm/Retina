<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Customer Management
            'Create New Customer',
            'All Customers',
            'Active Customers',
            'Inactive Customers',
             // Service Management
            'Service Category',
            'Service Sub-Category',
            'Product Configuration',
            'Product Listing',
            // Center Management
            'Create New Center',
            'Generate Center QR Code',
            'View Center Listing',
            // Discount and Promos
            'Create New Discount',
            'Create New Promo',
            'Discount History',
            'Promo History',
            // Booking Management
            'Create New Booking',
            'Booking History',
            // Check-In Manager
            'New Check-In',
            'Check-In History',
            'Check-Out History',
            // Wi-Fi Usage
            'View Access History',
            'View Usage History',
            // Video Tour Upload
            'Upload The Video',
            'View Video Uploads',
            // Physical Tour Management
            'Create New Tour',
            'View Booked Tour',
            // Amenities Manager
            'Create Amenities',
            'Amenities Listing',
            // Hosted Apartments
            'Create New Apartment Host',
            'View Host Apartment Listing',
            // Events Manager
            'Add New Event',
            'View Event Listing',
            // Payment Management
            'Configure Taxes',
            'View Successful Payments',
            'View Cancelled Payments',
            'View Failed Payment',
            'View All Invoices',
            'View Paid Invoices',
            'View Pending Invoices',
            'View Overdue Invoices',
            // Reviews Management
            'View All Reviews',
            'View Approved Reviews',
            'View DisApproved Reviews',
            'View Pending Reviews',
            // Newsletter Subscriptions
            'Add New Subscriber',
            'View All Subscribers',
            // Support Tickets
            'Billing Support',
            'Technical Support',
            'Customer Service',
            // Cancellation Management
            'Create Cancellation Reason',
            'View All Cancellation',
            // Content Management System
            'View All CMS Pages',
            'View Email Templates',
            'Change Logo',
            // General Settings
            'Role Based Manager',
            'Create Admin Profile',
            'Create Center Manager',
            'Authentication Log',
            'Session Log',
            'Admin Activity Log',
            'Password Reset Log',
            'Authorization Log',

        ];
     $module_name = [
            // Customer Management
            'Customer Management',
            'Customer Management',
            'Customer Management',
            'Customer Management',
             // Service Management
            'Service Management',
            'Service Management',
            'Service Management',
            'Service Management',
            // Center Management
            'Center Management',
            'Center Management',
            'Center Management',
            // Discount and Promos
            'Discount and Promos',
            'Discount and Promos',
            'Discount and Promos',
            'Discount and Promos',
            // Booking Management
            'Booking Management',
            'Booking Management',
            // Check-In Manager
            'Check-In Manager',
            'Check-In Manager',
            'Check-In Manager',
            // Wi-Fi Usage
            'Wi-Fi Usage',
            'Wi-Fi Usage',
            // Video Tour Upload
            'Video Tour Upload',
            'Video Tour Upload',
            // Physical Tour Management
            'Physical Tour Management',
            'Physical Tour Management',
            // Amenities Manager
            'Amenities Manager',
            'Amenities Manager',
            // Hosted Apartments
            'Hosted Apartments',
            'Hosted Apartments',
            // Events Manager
            'Events Manager',
            'Events Manager',
            // Payment Management
            'Payment Management',
            'Payment Management',
            'Payment Management',
            'Payment Management',
            'Payment Management',
            'Payment Management',
            'Payment Management',
            'Payment Management',
            // Reviews Management
            'Reviews Management',
            'Reviews Management',
            'Reviews Management',
            'Reviews Management',
            // Newsletter Subscriptions
            'Newsletter Subscriptions',
            'Newsletter Subscriptions',
            // Support Tickets
            'Support Tickets',
            'Support Tickets',
            'Support Tickets',
            // Cancellation Management
            'Cancellation Management',
            'Cancellation Management',
            // Content Management System
            'Content Management System',
            'Content Management System',
            'Content Management System',
            // General Settings
            'General Settings',
            'General Settings',
            'General Settings',
            'General Settings',
            'General Settings',
            'General Settings',
            'General Settings',
            'General Settings',

        ];
        foreach ($permissions as $key => $permission) {
            $permission = Permission::create(['guard_name' => 'admin', 'name' => $permission,'module_name'=> $module_name[$key]]);
        }
    }
}