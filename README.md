# Citizen Manifesto

This repository contains a bare WordPress 7.0 install customized for a police accountability and public-interest reporting site called **Citizen Manifesto**.

## Included custom themes

- **Citizen Manifesto Noir** - dark investigative magazine style for redacted records and long-form investigations.
- **Citizen Manifesto Field Notes** - warm documentary notebook style for local dispatches and community-sourced incident logs.
- **Citizen Manifesto Public Record** - civic newspaper style for FOIA, court records, and public-record coverage.
- **Citizen Manifesto Signal** - high-contrast digital dispatch style for breaking news and urgent alerts.
- **Citizen Manifesto Briefing** - calm editorial style for explainers, weekly roundups, and analysis.

Each theme includes templates for regular posts, pages, archives, search, comments, and the `incident` post type supplied by the Citizen Manifesto Toolkit plugin.

## Included custom plugin

Activate **Citizen Manifesto Toolkit** to add:

- `Incidents` custom post type at `/incidents/`.
- `Incident Types`, `Jurisdictions`, and `Incident Statuses` taxonomies.
- Incident metadata fields for date, location, coordinates, source URL, and record/anonymity notes.
- Image sizes for evidence and article cards.
- Basic public-facing security headers.
- `[citizen_manifesto_incidents count="6"]` shortcode.

## Recommended installed plugins

The `wp-content/plugins` directory includes a reporting-site baseline: security, anti-spam, two-factor auth, login protection, backups, SEO, redirects, performance, image optimization, thumbnail regeneration, galleries, maps, SMTP/contact forms, and editorial workflow tools. Activate and configure them in wp-admin after creating `wp-config.php` and finishing WordPress setup.
