# ESDM APPS with FILAMENT 

#### ✨ Features

-   🛡️ **User & Access Management**

    -   Comprehensive role-based access control
    -   Multiple user roles with granular permissions
    -   Secure authentication workflows

-   👤 **Profile & User Experience**

    -   Customizable profile page
    -   Dark/light mode switching
    -   Personalized user dashboard

-   🎨 **Theme & UI Customization**

    -   Theme settings for panel colors and layout preferences
    -   Modular design for easy extension
    -   Responsive interface for all devices

-   🌐 **Content Management**

    -   Blog module with categories and tags
    -   Banner management system
    -   Event scheduling capabilities

-   📊 **Media Management**

    -   Complete media library
    -   Image optimization and thumbnails
    -   Easy upload and organization

-   📧 **Email & Notifications**

    -   Configure mail settings on the fly
    -   Customizable email templates
    -   User notification system

-   🔧 **System Configuration**

    -   Frontend web settings (Site Name, Scripts, etc.)
    -   Log viewer and error tracking
    -   Developer-friendly tools

-   🔍 **SEO & Analytics**

    -   Comprehensive SEO settings and optimization
    -   Laravel Trend integration for data visualization
    -   Traffic and user analytics

-   🛠️ **Developer Experience**
    -   Optimized performance out of the box
    -   Code editor integration
    -   Testing tools and infrastructure

#### Latest update

##### Version: v1.19.0

-   User impersonation feature for admins
-   Contact Us stats dashboard widget
-   Blog module improvements (stats, author filtering, status tracking)
-   Enhanced menu builder with more locations and configuration
-   Clustered site settings and new site editor page
-   Improved site logo functionality
-   Updated panel footer and various UI/UX enhancements
-   Improved security headers, new middleware, and log channels
-   Enhanced afterSave hooks and visibility suffix actions
-   Updated translations and language generator improvements
-   Various bug fixes and styling improvements

#### Getting Started

Run migration & seeder:

```bash
php artisan migrate
php artisan db:seed
```

<p align="center">or</p>

```bash
php artisan migrate:fresh --seed
```

`IMPORTANT!!` If you have any error with menu tables, please run below:
```bash
php artisan migrate --path=database/migrations/2024_09_15_032446_create_menus_table.php
```

Generate Shield permissions & policies:

```bash
php artisan shield:generate --all
```

One Liner:

````bash
php artisan migrate && php artisan db:seed && php artisan shield:generate --all
````
[Important] Bind permissions to roles:

```bash
php artisan db:seed --class=PermissionsSeeder
````

Generate key:

```bash
php artisan key:generate
```

Storage Link:

```bash
php artisan storage:link
```

Install dependencies:

```bash
npm install
```

Build :

```bash
npm run dev
OR
npm run build
```

Start development server:

```bash
php artisan serve
```

Now you can access with `/admin` path, using:

```bash
email: superadmin@starter-kit.com
password: superadmin
```

#### Performance

_It's recommend to run below command as suggested in [Filament Documentation](https://filamentphp.com/docs/3.x/panels/installation#improving-filament-panel-performance) for improving panel perfomance._

```bash
php artisan icons:cache
```

### License

Filament Starter is provided under the [MIT License](LICENSE.md).

If you discover a bug, please [open an issue](https://github.com/riodwanto/superduper-filament-starter-kit/issues).
