# StoringApp - AI Coding Agent Instructions

StoringApp is a PHP-based incident reporting system for DeveloperLand's technical department. It allows staff to report attraction malfunctions and track maintenance issues.

## Project Architecture

### Directory Structure & Responsibilities
- **`index.php`** - Homepage entry point (Dutch UI with logo and welcome)
- **`config/`** - Application configuration
  - `config.php` - Local database credentials (created from template, never committed)
  - `conn.php` - PDO database connection setup with exception error mode
- **`app/Http/Controllers/`** - Request handlers
  - `meldingenController.php` - Handles incident report form submissions (INSERT operations)
- **`resources/views/`** - Template files organized by feature
  - `components/head.php`, `header.php` - Reusable UI components
  - `meldingen/index.php` - List view for incidents (placeholder for fetch/display)
  - `meldingen/create.php` - Form to create new incident reports
- **`public_html/`** - Static assets (CSS, images)
- **`database/storingapp.sql`** - Database schema with `meldingen` table

### Data Model
The `meldingen` table stores incident reports with fields:
- Core info: `attractie` (attraction name), `type` (malfunction type), `melder` (reporter name)
- Status: `prioriteit` (boolean flag), `gemeld_op` (timestamp)
- Capacity: `capaciteit` (hourly capacity), `overige_info` (additional notes)

## Development Workflow

### Setup
1. Database: Import `database/storingapp.sql` into phpMyAdmin
2. Configuration: Copy `config/config.php` to a local version (in .gitignore) and set:
   - Database credentials (`$dbHost`, `$dbName`, `$dbUser`, `$dbPass`)
   - `$base_url` - local development URL (e.g., `http://praopdracht.test/storingapp/`)
3. Serve via local web server (Laragon/XAMPP running on `praopdracht.test`)

### Running & Testing
- Access via browser: `http://praopdracht.test/storingapp/`
- Navigate to "Meldingen" → "Nieuwe melding" to test form submission
- Verify PDO queries execute without SQL errors

## Code Patterns & Conventions

### Database Access Pattern (PDO)
Used in controllers like `meldingenController.php`:
```php
require_once "conn.php";  // Provides $conn (PDO object)
$query = "INSERT INTO meldingen (attractie, type) VALUES (:attractie, :type)";
$statement = $conn->prepare($query);
$statement->execute([":attractie" => $attractie, ":type" => $type]);
$items = $statement->fetchAll(PDO::FETCH_ASSOC);  // For SELECT queries
```
- Always use prepared statements with named placeholders (`:field`)
- PDO is configured with `PDO::ERRMODE_EXCEPTION` for error handling

### View Layer & Configuration Injection
Views include `config.php` to access `$base_url` for URL generation:
```php
<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!-- Use $base_url for all absolute links -->
<a href="<?php echo $base_url; ?>/resources/views/meldingen/index.php">Link</a>
```
- Paths use relative require with `__DIR__` for portability
- All external URLs constructed with `$base_url` prefix (no trailing slash)

### Form Handling
Forms POST to `app/Http/Controllers/meldingenController.php`:
```php
<form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
```
- Extract POST data at top of controller: `$attractie = $_POST['attractie'];`
- Controllers redirect back to view with query string messages: `index.php?msg=Success`

### UI Components
Navigation and metadata are in reusable components:
- `head.php` - Meta tags, CSS links (uses `$base_url`)
- `header.php` - Logo and navigation menu (hardcoded Dutch labels)
- CSS uses HTML5 Boilerplate (normalize.css + main.css)

## Key Files to Reference
- **PDO pattern**: `config/conn.php` (connection setup)
- **Controller example**: `app/Http/Controllers/meldingenController.php`
- **Form view**: `resources/views/meldingen/create.php`
- **Database schema**: `database/storingapp.sql`
- **Config template**: `README.md` (mentions `config.example.php` pattern)

## Language & Localization
- UI is entirely in Dutch (Nederlands)
- Database values follow Dutch naming (e.g., `melder`, `gemeld_op`, `overige_info`)
- When adding features, maintain Dutch labels in templates

## Common Tasks
- **Add new fields to incident form**: Update form in `create.php`, database schema, and controller INSERT query
- **Display incident list**: Implement SELECT query in `resources/views/meldingen/index.php` with PDO pattern
- **Add validation**: Server-side in controller before execute(), with user feedback via query string `?msg=`
- **Update database locally**: Re-import `storingapp.sql` after schema changes
