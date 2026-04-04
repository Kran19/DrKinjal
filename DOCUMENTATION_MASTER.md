# DrKinjal E-Commerce Platform - Master Documentation

**Project**: DrKinjal  
**Type**: Full-Stack E-Commerce Platform  
**Framework**: Laravel 12  
**Date Created**: February 16, 2026  
**Last Updated**: March 28, 2026  
**Status**: ✅ Production Ready  

---

## 📖 Complete Documentation Index

This master document consolidates all project references into a single, comprehensive guide ready for use in word processing applications. It provides the architectural blueprint, data dictionary, and operational reference for the DrKinjal system.

---

## 1. System Overview

**DrKinjal** is a comprehensive, production-ready e-commerce platform built with **Laravel 12**. It provides complete functionality for online retail operations including product management, shopping cart, order processing, payment integration, customer management, inventory tracking, and analytics.

### Key Capabilities
- **Multi-product catalog** with variants, attributes, and specifications
- **Configurable products** with multiple variants and pricing strategies
- **Shopping cart management** with real-time calculations
- **Order processing pipeline** with payment integration (Razorpay)
- **Inventory management** across multiple warehouses
- **Customer relationship management** with loyalty programs
- **Promotional engine** with discounts, offers, and coupons
- **Review & rating system** with customer feedback
- **Shipping integration** with multiple carriers and zones
- **Admin dashboard** for complete store management
- **RESTful APIs** for frontend integration
- **Notification system** (Email, SMS, Push, In-App)
- **SEO optimization** with metadata management
- **Audit & activity logging** for compliance

---

## 2. System Requirements

### Server Requirements
| Requirement | Specification |
|---|---|
| **PHP Version** | 8.2 or higher |
| **Web Server** | Apache 2.4+ / Nginx 1.20+ |
| **Database** | MySQL 8.0+ / MariaDB 10.5+ |
| **Memory** | Minimum 512MB; Recommended 2GB+ |
| **Disk Space** | Minimum 5GB (for application & media) |
| **Processor** | Dual-core processor minimum |

### Software Dependencies
| Tool | Version | Purpose |
|---|---|---|
| **Laravel Framework** | 12.0+ | Application framework |
| **Composer** | 2.0+ | PHP dependency manager |
| **Node.js** | 18.0+ | Frontend build tools |
| **NPM** | 9.0+ | JavaScript package manager |
| **Redis** | 6.0+ | Caching & session storage (optional) |
| **Elasticsearch** | 7.0+ | Advanced search (optional) |

### Required PHP Extensions
- PDO MySQL
- cURL
- JSON
- OpenSSL
- mcrypt
- ZIP
- GD (for image processing)
- Intervention/Image
- Mbstring

---

## 3. Architecture & Methodology

### Architectural Pattern: MVC + Service Layer

The DrKinjal platform follows a modified **Model-View-Controller (MVC)** architecture with an additional **Service Layer** for business logic separation.

**Module Breakdown**:

#### 1. Catalog Management Module
- Product CRUD operations
- Category hierarchy management
- Brand management
- Attribute and specification system
- Product variants and SKU management
- Media management

#### 2. Shopping Experience Module
- Shopping cart management
- Wishlist functionality
- Product search and filtering
- Review and rating system
- Product recommendations

#### 3. Order Management Module
- Cart to order conversion
- Order status management
- Order fulfillment pipeline
- Shipment tracking
- Return/RMA management

#### 4. Payment Processing Module
- Payment method integration
- Razorpay payment gateway
- Payment status tracking
- Refund processing
- Payment audit trail

#### 5. Inventory Management Module
- Multi-warehouse inventory tracking
- Stock level management
- Inventory transfers between warehouses
- Stock history logging
- Low stock alerts

#### 6. Customer Management Module
- Customer registration and profiles
- Address management
- Customer segmentation
- Loyalty program tracking
- Customer activity logging

#### 7. Promotional Engine Module
- Offer and coupon management
- Discount calculations
- BOGO (Buy One Get One) offers
- Tiered and percentage discounts
- Offer usage tracking

#### 8. Notification System
- Email notifications
- SMS capabilities
- Push notifications
- In-app notifications
- Customizable notification templates

---

## 4. Entity Relationship & Database Design

### Master Entity Groups (Descriptions)

The system is built on a robust relational foundation with approximately 79 tables. Below are the primary entity groups and their responsibilities.

#### Group 1: User & Authentication
- **ADMINS**: Stores administrative user data, roles, and status.
- **CUSTOMERS**: Stores customer profile data, credentials, and verification status.
- **PASSWORD_HISTORIES**: Tracks previous password hashes for security compliance.

#### Group 2: Product Catalog
- **PRODUCTS**: The central table for all catalog items. Includes metadata like slug, type (simple/configurable/bundle), brand, and categorization.
- **PRODUCT_VARIANTS**: Every variant (e.g., Size: L, Color: Red) is a separate SKU with its own price, cost, and stock level.
- **BRANDS**: Manufacturer and brand information.
- **CATEGORIES**: Recursive hierarchy for organizing products.
- **ATTRIBUTES & VALUES**: Dynamic system for defining variant options (Select, Color, Image, etc.).
- **SPECIFICATIONS**: Technical data sheets for products organized by groups.

#### Group 3: Shopping & Cart
- **CARTS**: Manages temporary shopping sessions for both guests and logged-in customers. Includes totals for tax, shipping, and discounts.
- **CART_ITEMS**: Individual line items in the cart pointing to specific variants.
- **WISHLISTS**: Collections of variants the customer intends to buy later.

#### Group 4: Orders & Payments
- **ORDERS**: Persistent record of a checkout. Tracks order numbers, customer IDs, status (pending to delivered), and addresses.
- **ORDER_ITEMS**: A snapshot of product data at the time of order to ensure historical accuracy.
- **PAYMENTS**: Records of successful or pending transactions via Razorpay.
- **PAYMENT_ATTEMPTS**: Detailed log of gateway interactions to debug payment failures.

#### Group 5: Inventory & Warehouses
- **WAREHOUSES**: Physical locations where stock is held.
- **WAREHOUSE_STOCKS**: Quantity and reserved quantity tracking per warehouse.
- **STOCK_HISTORY**: An immutable log of every stock change (increase, decrease, transfer, adjustment).
- **INVENTORY_TRANSFERS**: Workflow for moving goods between physical locations.

#### Group 6: Shipments & Returns
- **SHIPMENTS**: Courier data, tracking numbers, and weight/dimension metadata.
- **RETURNS**: Logic for handling RMA requests, refunds, and replacements.
- **SHIPPING_METHODS**: Configuration for delivery partners and their service levels.

---

## 5. Granular Data Dictionary (79 Tables)

This section provides the complete technical specification for every table in the DrKinjal database.

### Module 1: Catalog & Taxonomy (Tables 1-16)

#### Table 1: products
- **Purpose**: Master table for all retail products.
- **Fields**:
  - `id`: bigint (PK), Primary Identifier.
  - `name`: varchar(255), Product title.
  - `slug`: varchar(255) (Unique), URL safe name.
  - `short_description`: text, Overview for listings.
  - `description`: longtext, Full technical and marketing details.
  - `product_type`: enum (simple, configurable, bundle, virtual, downloadable).
  - `brand_id`: bigint (FK), Link to brands table.
  - `main_category_id`: bigint (FK), Canonical category link.
  - `tax_class_id`: bigint (FK), Applicable tax rules.
  - `status`: enum (draft, active, inactive, archived).
  - `is_featured`: tinyint(1) default 0.
  - `meta_title`: varchar(160), SEO Optimization.
  - `meta_description`: text, SEO Optimization.
  - `created_at`: timestamp.
  - `updated_at`: timestamp.

#### Table 2: product_variants
- **Purpose**: Holds specific SKU data for variations (e.g., Size, Color).
- **Fields**:
  - `id`: bigint (PK).
  - `product_id`: bigint (FK).
  - `sku`: varchar(100) (Unique).
  - `price`: decimal(15,2).
  - `compare_price`: decimal(15,2), Original price for discounts.
  - `cost_price`: decimal(15,2), Purchase price for margin analysis.
  - `stock_quantity`: integer, Physical stock available.
  - `reserved_quantity`: integer, Items in checkout processing.
  - `stock_status`: enum (in_stock, out_of_stock, backorder).
  - `is_default`: tinyint(1).

#### Table 3: variant_attributes
- **Purpose**: Mapping table linking variants to their specific attribute values.
- **Fields**:
  - `id`, `product_variant_id`, `attribute_id`, `attribute_value_id`.

#### Table 4: variant_images
- **Purpose**: Assigning specific images to SKUs (e.g. Blue Shirt image).
- **Fields**:
  - `id`, `product_variant_id`, `media_id`.

#### Table 5: categories
- **Purpose**: Hierarchical classification.
- **Fields**:
  - `id`, `parent_id`, `name`, `slug`, `description`, `image_id`, `status`.

#### Table 6: brands
- **Purpose**: Manufacturer and designer details.
- **Fields**:
  - `id`, `name`, `slug`, `logo_id`, `status`, `description`.

#### Table 7: attributes
- **Purpose**: Definitions of properties (e.g. "Size").
- **Fields**:
  - `id`, `name`, `code` (Unique), `type` (dropdown, color, tag), `is_variant`.

#### Table 8: attribute_values
- **Purpose**: Values for attributes (e.g. "L", "XL").
- **Fields**:
  - `id`, `attribute_id`, `value`, `label`, `color_code`.

#### Table 9: specifications
- **Purpose**: Technical details (e.g. "Screen Resolution").
- **Fields**:
  - `id`, `name`, `group_id`.

#### Table 10-16: Catalog Support
- `specification_groups`, `specification_values`, `tags`, `product_tags`, `category_product`, `category_hierarchies`, `category_attributes`.

### Module 2: Transaction & Store (Tables 17-30)

#### Table 17: orders
- **Purpose**: Permanent record of a purchase.
- **Fields**:
  - `id`, `order_number` (Unique), `customer_id`, `status`, `payment_status`, `shipping_status`, `grand_total`, `shipping_address` (JSON snapshot).

#### Table 18: order_items
- **Purpose**: Snapshot of variants sold in an order.
- **Fields**:
  - `id`, `order_id`, `product_variant_id`, `sku`, `name`, `quantity`, `price`.

#### Table 19: cart
- **Purpose**: Persistent temporary session storage for items.
- **Fields**:
  - `id`, `customer_id` (nullable), `session_id` (Unique for guests).

#### Table 20: cart_items
- **Fields**:
  - `cart_id`, `product_variant_id`, `quantity`, `unit_price`, `total`.

#### Table 21: payments
- **Purpose**: Gateway transaction records.
- **Fields**:
  - `id`, `order_id`, `transaction_id`, `amount`, `status`, `gateway_response`.

#### Table 22: payment_attempts
- **Purpose**: Logs every payment interaction to debug failures.

#### Table 23: product_reviews
- **Purpose**: Customer feedback and ratings.
- **Fields**:
  - `id`, `product_id`, `customer_id`, `rating` (1-5), `comment`.

#### Table 24-30: Transaction Support
- `review_images`, `review_votes`, `shipments`, `shipment_items`, `returns`, `return_items`, `order_status_history`.

### Module 3: Inventory & Logistics (Tables 31-40)

#### Table 31: warehouses
- **Purpose**: Multiple storage location management.
- **Fields**:
  - `id`, `name`, `code`, `address`, `city`, `pincode`, `status`.

#### Table 32: warehouse_stocks
- **Purpose**: Current stock levels per location.
- **Fields**:
  - `warehouse_id`, `product_variant_id`, `quantity`, `reserved`.

#### Table 33: stock_history
- **Purpose**: Digital ledger for auditing every stock change.
- **Fields**:
  - `id`, `variant_id`, `change_qty`, `reason`, `old_qty`, `new_qty`.

#### Table 34-40: Logistics Support
- `inventory_transfers`, `inventory_transfer_items`, `price_histories`, `tier_prices`, `shipping_methods`, `shipping_zones`, `shipping_charges`.

### Module 4: Customer & Marketing (Tables 41-55)

#### Table 41: customers
- **Purpose**: Shopper identity management.
- **Fields**:
  - `id`, `name`, `email`, `mobile`, `status`, `verified_at`.

#### Table 42: customer_addresses
- **Fields**:
  - `customer_id`, `type` (Shipping/Billing), `address_line1`, `city`, `zip`.

#### Table 43: offers
- **Purpose**: Discount and Promotional engine.
- **Fields**:
  - `id`, `name`, `code`, `type` (Percentage/Fixed/BOGO), `value`.

#### Table 44: offer_usages
- **Fields**:
  - `offer_id`, `customer_id`, `order_id`, `used_at`.

#### Table 45: loyalty_programs
- **Purpose**: Point earning/redemption structure.

#### Table 46-55: Customer Support
- `customer_loyalty`, `loyalty_transactions`, `customer_segments`, `customer_segment_members`, `password_histories`, `notifications`, `notification_templates`, `email_logs`, `sms_logs`, `activity_logs`.

### Module 5: System & Platform (Tables 56-79)

#### Table 56: media
- **Purpose**: Centralized file library.
- **Fields**:
  - `id`, `file_name`, `path`, `mime`, `size`.

#### Table 57: settings
- **Fields**:
  - `id`, `key`, `value`, `type`, `description`.

#### Table 58-79: Platform Support
- `currencies`, `tax_classes`, `tax_rates`, `failed_jobs`, `migrations`, `personal_access_tokens`, `password_reset_tokens`, `media_conversions`, `analytics_snapshots`, `system_logs`, `audit_trails`, `related_products`, `upsell_products`, `cross_sell_products`, `variant_specifications`, `category_spec_groups`, `specification_values_history`, `shipping_label_data`, `payment_methods`, `gift_cards`, `gift_card_transactions`, `sessions`, `user_agents`, `ip_logs`.

---

## 6. Logic & Implementation Details

### Module 1: Catalog Logic
The Catalog module use the Category Hierarchy to provide a breadcrumb navigation. When a user creates a Configurable Product, the system automatically generates Product Variants based on the cross-product of available attributes (e.g. 3 Sizes x 2 Colors = 6 Variatns). Each variant is assigned a unique sku for inventory tracking.

### Module 2: Order Fulfillment Workflow
1. PENDING: Order created, stock reserved.
2. CONFIRMED: Payment successful via Razorpay.
3. PROCESSING: Warehouse staff is picking the items.
4. SHIPPED: Tracking number added, courier dispatched.
5. DELIVERED: Final handover complete.

### Module 3: Promotion Engine Rules
- Automatic Apply: No code needed (e.g., Seasonal Sale).
- Manual Coupon: Code required in checkout.
- Exclusion Logic: Offers can be limited to specific categories or products to prevent margin loss.

---

## 7. Security Policy Reference

### Authentication (Sanctum)
We use Laravel Sanctum for API token management. Tokens are hashed and stored in the personal_access_tokens table. They are revocable at any time from the customer profile.

### Payment Protection
All financial data is handled by Razorpay. DrKinjal only stores the Transaction ID and Status. No credit card numbers or CVV codes ever touch the local database, ensuring PCI compliance.

### Data Validation
Input sanitization on all text fields.
Type enforcement (Int, Decimal) on financial fields.
Unique constraints on critical identifiers (SKU, Slug, Email).

---

## 8. Development & Setup Guide

### Local Environment Setup
1. Pull Code: git clone <repo>
2. Install: composer install followed by npm install.
3. Env Config: Set DB_DATABASE, DB_USERNAME, and RAZORPAY_KEYS.
4. Key Generation: php artisan key:generate.
5. Database Init: php artisan migrate --seed.
6. Frontend Build: npm run build.

---

## 9. Conclusion

The DrKinjal e-commerce platform represents a state-of-the-art implementation of Laravel 12 features. With a normalized database of 79 tables and a modular service-oriented architecture, it is built to handle thousands of transactions per day while remaining maintainable for developers.

---

## APPENDIX: Glossary of Terms

- **SKU**: Stock Keeping Unit. A unique identifier for a specific product variant.
- **RMA**: Return Merchandise Authorization. The process for handling customer returns.
- **BOGO**: Buy One Get One. A common promotional rule.
- **MSRP**: Manufacturer's Suggested Retail Price. Stored in `compare_price`.
- **FK**: Foreign Key. A database constraint linking one table to another.
- **PK**: Primary Key. The unique identifier for a row in a table.
- **Slug**: A URL-friendly string used in place of IDs for SEO.
- **Sanctum**: Laravel's lightweight authentication system for APIs.
- **Razorpay**: The primary payment gateway used for transactions.
- **Audit Trail**: A chronological record of all changes made to sensitive data.

---

*(c) 2026 DrKinjal. All Rights Reserved.*
*(Generated for Word Processing Compatibility)*
