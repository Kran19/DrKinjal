# DrKinjal E-Commerce Platform - System Documentation

## Table of Contents
1. [System Overview](#system-overview)
2. [System Requirements](#system-requirements)
3. [Architecture & Methodology](#architecture--methodology)
4. [Data Flow Diagram (DFD)](#data-flow-diagram-dfd)
5. [Entity Relationship Diagram (ER)](#entity-relationship-diagram-er)
6. [Module Breakdown](#module-breakdown)
7. [API Architecture](#api-architecture)
8. [Database Design](#database-design)

---

## System Overview

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

## System Requirements

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
```
- PDO MySQL
- cURL
- JSON
- OpenSSL
- mcrypt
- ZIP
- GD (for image processing)
- Intervention/Image
- Mbstring
```

### Browser Compatibility
| Browser | Version | Notes |
|---|---|---|
| Chrome | Latest 2 versions | Full support |
| Firefox | Latest 2 versions | Full support |
| Safari | Latest 2 versions | Full support |
| Edge | Latest 2 versions | Full support |

### Network Requirements
- **HTTPS/SSL Certificate** - Required for production
- **TLS 1.2+** protocol support
- **Mail Server** - SMTP for transactional emails
- **Payment Gateway** - Razorpay merchant account
- **SMS Gateway** - Optional (for SMS notifications)

---

## Architecture & Methodology

### Architectural Pattern: MVC + Service Layer

The DrKinjal platform follows a modified **Model-View-Controller (MVC)** architecture with an additional **Service Layer** for business logic separation.

```
┌─────────────────────────────────────────────────────────┐
│                    Frontend Layer (Vue.js/React)        │
│              (SPA - Single Page Application)             │
└──────────────────────┬──────────────────────────────────┘
                       │ HTTP/REST API
┌──────────────────────▼──────────────────────────────────┐
│              API Controllers Layer                      │
│      (Routes, Request Validation, Response Format)     │
└──────────────────────┬──────────────────────────────────┘
                       │
┌──────────────────────▼──────────────────────────────────┐
│            Service Layer                                │
│   (Business Logic, Calculations, Validation)           │
│   ├─ CartService                                       │
│   ├─ OrderService                                      │
│   ├─ PaymentService                                    │
│   ├─ InventoryService                                  │
│   ├─ NotificationService                              │
│   └─ LoyaltyService                                    │
└──────────────────────┬──────────────────────────────────┘
                       │
┌──────────────────────▼──────────────────────────────────┐
│             Eloquent Models Layer                       │
│   (Database ORM, Relationships, Query Building)        │
└──────────────────────┬──────────────────────────────────┘
                       │
┌──────────────────────▼──────────────────────────────────┐
│          Database Layer (MySQL/InnoDB)                 │
│   ├─ Catalog Tables      ├─ Transaction Tables        │
│   ├─ Order Tables        ├─ Lookup Tables             │
│   └─ Analytics Tables    └─ Audit Tables              │
└─────────────────────────────────────────────────────────┘
```

### Core Modules

#### 1. **Catalog Management Module**
- Product CRUD operations
- Category hierarchy management
- Brand management
- Attribute and specification system
- Product variants and SKU management
- Media management

#### 2. **Shopping Experience Module**
- Shopping cart management
- Wishlist functionality
- Product search and filtering
- Review and rating system
- Product recommendations

#### 3. **Order Management Module**
- Cart to order conversion
- Order status management
- Order fulfillment pipeline
- Shipment tracking
- Return/RMA management

#### 4. **Payment Processing Module**
- Payment method integration
- Razorpay payment gateway
- Payment status tracking
- Refund processing
- Payment audit trail

#### 5. **Inventory Management Module**
- Multi-warehouse inventory tracking
- Stock level management
- Inventory transfers between warehouses
- Stock history logging
- Low stock alerts

#### 6. **Customer Management Module**
- Customer registration and profiles
- Address management
- Customer segmentation
- Loyalty program tracking
- Customer activity logging

#### 7. **Promotional Engine Module**
- Offer and coupon management
- Discount calculations
- BOGO (Buy One Get One) offers
- Tiered and percentage discounts
- Offer usage tracking

#### 8. **Notification System**
- Email notifications
- SMS capabilities
- Push notifications
- In-app notifications
- Customizable notification templates

### Design Patterns Used

1. **Repository Pattern** - Data access abstraction
2. **Service Pattern** - Business logic encapsulation
3. **Factory Pattern** - Model creation
4. **Observer Pattern** - Event-driven operations
5. **Strategy Pattern** - Different payment/shipping strategies
6. **Dependency Injection** - Loose coupling via IoC container

### Technology Stack

| Layer | Technology |
|---|---|
| **Backend** | Laravel 12, PHP 8.2+ |
| **Frontend** | HTML5, CSS3, Tailwind CSS, Vue.js/React |
| **Database** | MySQL 8.0+ (InnoDB) |
| **API** | RESTful API with JSON |
| **Real-time** | Laravel WebSockets / Pusher |
| **Caching** | Redis / Memcached |
| **Payment** | Razorpay API |
| **Storage** | Local filesystem / AWS S3 |
| **Search** | MySQL Full-text / Elasticsearch |
| **Queue** | Redis / Database queue |
| **Authentication** | Laravel Sanctum (API tokens) |

---

## Data Flow Diagram (DFD)

### Level 0 - System Context Diagram

The DrKinjal system operates with multiple external entities:

```
                    ┌─────────────┐
                    │  Customer   │
                    └──────┬──────┘
                           │
        ┌──────────────────┼──────────────────┐
        │                  │                  │
        ▼                  ▼                  ▼
    Browse & Search   Place Order      Track Package
        │                  │                  │
        │                  ▼                  │
    ┌───────────────────────────────────────────┐
    │    DrKinjal E-Commerce Platform          │
    │  (Core Business Logic & Data Management) │
    └───────────────────────────────────────────┘
        │                  │                  │
        ▼                  ▼                  ▼
    Product Data    Order Processing  Shipment Updates
        │                  │                  │
        │                  ▼                  │
        │          ┌──────────────┐          │
        ├─────────▶│   Payment    │◀─────────┤
        │          │   Gateway    │          │
        │          └──────────────┘          │
        │                  │                  │
        ▼                  ▼                  ▼
    Inventory System  Admin Dashboard  Logistics Partner
```

### Level 1 - Main Process Flow

```
┌────────────────────────────────────────────────────────────────┐
│                   CUSTOMER JOURNEY FLOW                         │
└────────────────────────────────────────────────────────────────┘

1. BROWSE PRODUCTS
   ├─ Retrieve product catalog from Database
   ├─ Apply filters (category, brand, price, attributes)
   ├─ Generate product recommendations
   └─ Display filtered results to customer

2. ADD TO CART
   ├─ Validate product variant availability
   ├─ Verify stock quantity
   ├─ Calculate discounts applicable
   ├─ Persist cart data (database/session)
   └─ Update cart total (items, subtotal, tax)

3. CHECKOUT PROCESS
   ├─ Verify shipping address
   ├─ Calculate shipping charges based on zone
   ├─ Apply tax rules
   ├─ Verify offer eligibility
   ├─ Calculate grand total
   └─ Reserve inventory

4. PAYMENT PROCESSING
   ├─ Submit payment to Razorpay gateway
   ├─ Wait for payment confirmation
   ├─ Log payment transaction
   ├─ Update payment status in database
   └─ Trigger order confirmation workflow

5. ORDER CREATION & FULFILLMENT
   ├─ Create order record with order number
   ├─ Reduce inventory stock
   ├─ Create order items from cart
   ├─ Send order confirmation email
   ├─ Notify warehouse staff
   └─ Trigger loyalty points calculation

6. SHIPMENT & DELIVERY
   ├─ Create shipment record
   ├─ Generate shipping label
   ├─ Update tracking information
   ├─ Send tracking updates to customer
   └─ Confirm delivery completion

7. POST-DELIVERY
   ├─ Request product review from customer
   ├─ Enable return/exchange requests
   ├─ Process returns if requested
   ├─ Issue refunds
   └─ Close order
```

### Level 2 - Detailed Process: Order Processing

```
┌──────────────────────────────────────────────────────────────┐
│              ORDER PROCESSING DETAIL FLOW                    │
└──────────────────────────────────────────────────────────────┘

START: Customer Initializes Checkout

│
├─▶ VALIDATE CART
│   ├─ Check cart items exist
│   ├─ Verify all variants are available
│   ├─ Check stock for each item
│   └─ Clear invalid items from cart
│
├─▶ CALCULATE ORDER TOTALS
│   ├─ Subtotal = SUM(item_price × quantity)
│   ├─ Apply item-level discounts
│   ├─ Apply cart-level discounts
│   ├─ Calculate tax = Subtotal × tax_rate
│   ├─ Calculate shipping = shipping_zone_fee
│   └─ Grand Total = Subtotal + Tax + Shipping - Discount
│
├─▶ CREATE ORDER RECORD
│   ├─ Generate unique order number
│   ├─ Save order with status='pending'
│   ├─ Copy cart items to order_items
│   ├─ Store shipping and billing addresses
│   └─ Store customer contact information
│
├─▶ PROCESS PAYMENT
│   ├─ Create payment request for Razorpay
│   ├─ Send customer to payment gateway
│   ├─ Receive payment callback
│   ├─ Verify payment signature
│   ├─ Update payment status in database
│   └─ If payment fails ─▶ Cancel order, Release cart
│
├─▶ POST-PAYMENT (On Success)
│   ├─ Update order status = 'confirmed'
│   ├─ Reserve inventory (reduce available stock)
│   ├─ Create shipment record
│   ├─ Calculate loyalty points earned
│   ├─ Update customer loyalty account
│   ├─ Send order confirmation notification
│   └─ Send warehouse notification
│
└─▶ END: Order recorded in system

    Subsequent Processing:
    ├─ Warehouse staff picks items
    ├─ QC verification
    ├─ Packing & labeling
    ├─ Handover to logistics
    ├─ Shipment tracking updates
    └─ Delivery confirmation
```

### Level 2 - Payment Flow

```
┌──────────────────────────────────────────────────────────────┐
│             PAYMENT PROCESSING FLOW                          │
└──────────────────────────────────────────────────────────────┘

CUSTOMER INITIATES PAYMENT

    │
    ├─▶ SYSTEM PREPARES PAYMENT REQUEST
    │   ├─ Retrieve order total
    │   ├─ Set currency
    │   ├─ Prepare order metadata
    │   └─ Generate payment ID
    │
    ├─▶ SUBMIT TO PAYMENT GATEWAY (Razorpay)
    │   ├─ Send order ID, amount, customer details
    │   ├─ Receive payment link/form
    │   └─ Redirect customer to Razorpay
    │
    ├─▶ CUSTOMER ENTERS PAYMENT DETAILS
    │   ├─ Select payment method (card/wallet/UPI/etc)
    │   ├─ Enter payment credentials
    │   ├─ Complete 3D Secure verification if needed
    │   └─ Submit payment
    │
    ├─▶ RAZORPAY PROCESSES PAYMENT
    │   ├─ Verify payment details
    │   ├─ Contact payment processor (bank/card network)
    │   ├─ Wait for transaction response
    │   └─ Return payment status to system
    │
    ├─▶ SYSTEM RECEIVES CALLBACK
    │   ├─ Verify webhook signature
    │   ├─ Validate payment status
    │   ├─ Update payment record in database
    │   └─ Trigger appropriate workflow
    │
    ├─▶ DETERMINE OUTCOME
    │   │
    │   ├─ IF PAYMENT SUCCESS
    │   │   ├─ Update order status = 'paid'
    │   │   ├─ Reduce inventory
    │   │   ├─ Generate confirmation email
    │   │   ├─ Add loyalty points
    │   │   └─ Trigger fulfillment workflow
    │   │
    │   └─ IF PAYMENT FAILED
    │       ├─ Update order status = 'payment_failed'
    │       ├─ Send failure notification to customer
    │       ├─ Offer retry option
    │       └─ Preserve cart for later retry
    │
    └─▶ END

ASYNC: Send notifications
    ├─ Order confirmation email
    ├─ SMS notification
    ├─ In-app notification
    └─ Warehouse alert
```

### Level 2 - Inventory Management Flow

```
┌──────────────────────────────────────────────────────────────┐
│         INVENTORY MANAGEMENT FLOW                            │
└──────────────────────────────────────────────────────────────┘

INVENTORY LIFECYCLE

INITIAL STOCK
    │
    ├─▶ STOCK RECEIVED AT WAREHOUSE
    │   ├─ Create warehouse_stocks entry
    │   ├─ Update quantity to received amount
    │   ├─ Update product_variants stock_quantity
    │   ├─ Log stock history entry
    │   └─ Product status changes to 'in_stock'
    │
    ├─▶ CUSTOMER PLACES ORDER
    │   ├─ Verify available stock > quantity
    │   ├─ Check stock_quantity - reserved_quantity > 0
    │   ├─ Create reservation (increase reserved_quantity)
    │   ├─ Lock stock from being sold to others
    │   └─ Log stock reservation history
    │
    ├─▶ PAYMENT CONFIRMED
    │   ├─ Convert reservation to actual deduction
    │   ├─ Reduce warehouse_stocks.quantity
    │   ├─ Update product_variants.stock_quantity
    │   ├─ Clear reservation flag
    │   ├─ Log stock deduction history
    │   └─ Trigger low stock alerts if below threshold
    │
    ├─▶ SHIPMENT PROCESSING
    │   ├─ Pick items from warehouse
    │   ├─ Create shipment record
    │   ├─ Link shipment_items to order_items
    │   ├─ Generate tracking number
    │   └─ Log shipment history
    │
    ├─▶ RETURN/REFUND (If applicable)
    │   ├─ Create return request
    │   ├─ Receive returned items
    │   ├─ Verify item condition
    │   ├─ Restore inventory (increase quantities)
    │   ├─ Process refund
    │   ├─ Update stock history
    │   └─ Re-activate product if previously out of stock
    │
    ├─▶ INVENTORY TRANSFER BETWEEN WAREHOUSES
    │   ├─ Create inventory_transfer record
    │   ├─ Mark items for transfer
    │   ├─ Reduce stock at source warehouse
    │   ├─ Transit status updates
    │   ├─ Increase stock at destination warehouse
    │   └─ Log transfer history
    │
    └─▶ LOW STOCK MANAGEMENT
        ├─ Monitor stock levels against threshold
        ├─ Trigger low stock alert
        ├─ Send notification to admin
        ├─ Mark product status as 'low_stock' if needed
        └─ Suggest reorder from supplier

LOW STOCK / OUT OF STOCK ALERTS
    └─ Send email to admin with reorder suggestions
```

---

## Entity Relationship Diagram (ER)

### Core Entity Groups

#### Group 1: User Management
```
Users System Entities

ADMINS
├── Attributes: id, name, email✓unique, password, role, status, last_login
└── Relationships:
    ├─ 1:N with activity_logs (admin_id)
    ├─ 1:N with audit_trails (admin_id)
    ├─ 1:N with order_status_history (admin_id)
    └─ 1:N with price_histories (changed_by)

CUSTOMERS
├── Attributes: id, name, email✓unique, mobile✓unique, password, status
├──              email_verified_at, mobile_verified_at, last_login
└── Relationships:
    ├─ 1:N with customer_addresses
    ├─ 1:N with customer_loyalty
    ├─ 1:N with carts
    ├─ 1:N with orders
    ├─ 1:N with customer_segment_members
    ├─ 1:N with wishlists
    ├─ 1:N with product_reviews
    ├─ 1:N with gift_cards
    └─ 1:N with notifications
```

#### Group 2: Product Catalog
```
Product Catalog System

PRODUCTS
├── Attributes: id, name✓unique, slug✓unique, product_type(simple/configurable/bundle)
├──              brand_id, main_category_id, status, is_featured, is_new
├──              description, weight, dimensions, meta_tags
└── Relationships:
    ├─ N:1 with brands
    ├─ 1:N with product_variants
    ├─ N:M with categories (category_product)
    ├─ N:M with tags (product_tags)
    ├─ N:M with product_reviews
    ├─ 1:N with product_specifications
    ├─ 1:N with related_products (recursive)
    ├─ 1:N with cross_sell_products (recursive)
    └─ 1:N with upsell_products (recursive)

PRODUCT_VARIANTS
├── Attributes: id, product_id✓foreign, sku✓unique, price, compare_price
├──              stock_quantity, reserved_quantity, stock_status
├──              combination_hash, is_default, weight, dimensions
└── Relationships:
    ├─ N:1 with products
    ├─ 1:N with variant_attributes
    ├─ 1:N with variant_images
    ├─ 1:N with tier_prices
    ├─ 1:N with price_histories
    ├─ 1:N with cart_items
    ├─ 1:N with order_items
    ├─ 1:N with warehouse_stocks
    ├─ 1:N with stock_history
    ├─ 1:N with wishlist_items
    └─ 1:N with offer_variants

CATEGORIES
├── Attributes: id, name, slug✓unique, parent_id, description
├──              status, featured, show_in_nav, sort_order, image_id
├──              meta_tags (title, description, keywords)
└── Relationships:
    ├─ N:1 with categories (parent_id - self-referencing)
    ├─ 1:N with categories (children - self-referencing)
    ├─ 1:N with category_hierarchies (ancestor)
    ├─ 1:N with category_hierarchies (descendant)
    ├─ N:M with products (category_product)
    ├─ N:M with attributes (category_attributes)
    ├─ 1:N with category_spec_groups
    ├─ N:M with offers (offer_categories)
    └─ N:1 with media (image_id)

ATTRIBUTES & SPECIFICATIONS
├── Attributes
│   ├── id, name, code✓unique, type(select/color/image/text)
│   ├── is_variant, is_filterable, sort_order, status
│   └── Relationships:
│       ├─ 1:N with attribute_values
│       ├─ N:M with categories (category_attributes)
│       └─ 1:N with variant_attributes
│
└── Attribute Values
    ├── id, attribute_id, value✓unique, label, color_code
    ├── image_id, sort_order, status
    └── Relationships:
        ├─ N:1 with attributes
        ├─ N:1 with media (image_id)
        └─ 1:N with variant_attributes
```

#### Group 3: Shopping & Orders
```
Shopping Cart & Order System

CARTS
├── Attributes: id, customer_id, session_id, currency_id
├──              status(active/abandoned/converted), subtotal, tax_total
├──              shipping_total, discount_total, grand_total
├──              offer_id, shipping_address_id, billing_address_id
└── Relationships:
    ├─ N:1 with customers
    ├─ N:1 with currencies
    ├─ N:1 with offers
    ├─ 1:N with cart_items
    ├─ N:1 with customer_addresses (shipping)
    └─ N:1 with customer_addresses (billing)

CART_ITEMS
├── Attributes: id, cart_id, product_variant_id, quantity
├──              unit_price, total, discount_amount, offer_id
└── Relationships:
    ├─ N:1 with carts
    ├─ N:1 with product_variants
    └─ N:1 with offers

ORDERS
├── Attributes: id, order_number✓unique, customer_id, shipping_method_id
├──              payment_method_id, currency_id, status, payment_status
├──              shipping_status, subtotal, tax_total, shipping_total
├──              discount_total, grand_total, offer_id
├──              shipping_address✓json, billing_address✓json
├──              loyalty_points_used, loyalty_points_earned
└── Relationships:
    ├─ N:1 with customers
    ├─ 1:N with order_items
    ├─ 1:N with order_status_history
    ├─ N:1 with shipping_methods
    ├─ N:1 with payment_methods
    ├─ N:1 with currencies
    ├─ N:1 with offers
    ├─ 1:N with payments
    ├─ 1:N with shipments
    ├─ 1:N with returns
    └─ 1:N with activity_logs

ORDER_ITEMS
├── Attributes: id, order_id, product_variant_id, product_name
├──              sku, quantity, unit_price, total, discount_amount
├──              attributes✓json, offer_id, loyalty_points
└── Relationships:
    ├─ N:1 with orders
    ├─ N:1 with product_variants
    ├─ N:1 with offers
    ├─ 1:N with shipment_items
    ├─ 1:N with return_items
    └─ 1:N with product_reviews
```

#### Group 4: Payment & Fulfillment
```
Payment Processing & Shipping

PAYMENTS
├── Attributes: id, order_id, payment_method_id, transaction_id✓unique
├──              amount, currency_id, payment_gateway, status
├──              request_data✓json, response_data✓json, failure_reason
├──              paid_at, created_at
└── Relationships:
    ├─ N:1 with orders
    ├─ N:1 with payment_methods
    ├─ N:1 with currencies
    └─ 1:N with returns (refund_payment_id)

PAYMENT_ATTEMPTS
├── Attributes: id, order_id, payment_method_id, attempt_id✓unique
├──              amount, status(initiated/failed/success/abandoned)
├──              gateway_response✓json, failure_reason
└── Relationships:
    ├─ N:1 with orders
    └─ N:1 with payment_methods

SHIPMENTS
├── Attributes: id, order_id, tracking_number✓unique, carrier
├──              status(pending/processing/shipped/delivered)
├──              weight, dimensions✓json, shipping_label✓json
├──              shipped_at, estimated_delivery, delivered_at
└── Relationships:
    ├─ N:1 with orders
    └─ 1:N with shipment_items

SHIPMENT_ITEMS
├── Attributes: id, shipment_id, order_item_id, quantity
└── Relationships:
    ├─ N:1 with shipments
    └─ N:1 with order_items

SHIPPING_METHODS & ZONES
├── Methods: id, name, code✓unique, is_active, sort_order
├── Zones: id, name, countries✓json, states✓json, zip_codes✓json
├── Charges: id, shipping_zone_id, shipping_method_id
│           min_weight, max_weight, min_price, max_price, charge
└── Relationships:
    ├─ shipping_charges - N:1 with shipping_zones
    ├─ shipping_charges - N:1 with shipping_methods
    └─ orders - N:1 with shipping_methods
```

#### Group 5: Promotions & Offers
```
Promotional Engine

OFFERS
├── Attributes: id, name, code✓unique, status, offer_type
├──              discount_value, min_cart_amount, max_cart_amount
├──              max_discount, max_uses, uses_per_customer
├──              starts_at, ends_at, is_auto_apply, is_stackable
├──              is_exclusive, customer_segment_id
└── Relationships:
    ├─ 1:N with offer_usages
    ├─ 1:N with offer_variants
    ├─ 1:N with offer_categories
    ├─ 1:N with offer_rewards
    ├─ N:1 with customer_segments
    ├─ 1:N with carts (offer_id)
    ├─ 1:N with cart_items (offer_id)
    ├─ 1:N with orders (offer_id)
    └─ 1:N with order_items (offer_id)

OFFER_USAGES
├── Attributes: id, offer_id, customer_id, order_id
├──              discount_amount, used_at
└── Relationships:
    ├─ N:1 with offers
    ├─ N:1 with customers
    └─ N:1 with orders

OFFER_VARIANTS, OFFER_CATEGORIES, OFFER_REWARDS
├── Link tables connecting offers to:
│   ├─ Product variants (for specific product discounts)
│   ├─ Categories (for category-wide discounts)
│   └─ Reward products (for BOGO offers)
```

#### Group 6: Customer Management
```
Customer Data Management

CUSTOMER_ADDRESSES
├── Attributes: id, customer_id, type(shipping/billing/both)
├──              name, mobile, address, city, state, country
├──              pincode, latitude, longitude, is_default
└── Relationships:
    ├─ N:1 with customers
    ├─ 1:N with carts (shipping_address, billing_address)
    └─ 1:N with carts (destination addresses)

CUSTOMER_SEGMENTS
├── Attributes: id, name, slug✓unique, conditions✓json
├──              customer_count, is_active
└── Relationships:
    ├─ 1:N with customer_segment_members
    ├─ 1:N with tier_prices (customer_segment_id)
    └─ 1:N with offers (customer_segment_id)

CUSTOMER_SEGMENT_MEMBERS
├── Attributes: id, customer_id, customer_segment_id
└── Relationships:
    ├─ N:1 with customers
    └─ N:1 with customer_segments
```

#### Group 7: Loyalty & Rewards
```
Loyalty Program System

LOYALTY_PROGRAMS
├── Attributes: id, name, slug✓unique, points_per_currency
├──              signup_bonus, first_purchase_bonus
├──              min_redeemable_points, point_value
├──              starts_at, ends_at, status
└── Relationships:
    ├─ 1:N with customer_loyalty
    └─ 1:N with loyalty_transactions (indirect)

CUSTOMER_LOYALTY
├── Attributes: id, customer_id, loyalty_program_id
├──              total_points, available_points, used_points
├──              expired_points, tier_level
└── Relationships:
    ├─ N:1 with customers
    ├─ N:1 with loyalty_programs
    └─ 1:N with loyalty_transactions

LOYALTY_TRANSACTIONS
├── Attributes: id, customer_loyalty_id, type(earn/redeem/expire/adjust)
├──              points, balance, reference_type, reference_id
├──              notes
└── Relationships:
    └─ N:1 with customer_loyalty
```

#### Group 8: Inventory Management
```
Warehouse & Stock Management

WAREHOUSES
├── Attributes: id, name, code✓unique, address, city, state
├──              country, pincode, contact_person, contact_number
├──              is_default, is_active
└── Relationships:
    ├─ 1:N with warehouse_stocks
    ├─ 1:N with inventory_transfers (from_warehouse)
    └─ 1:N with inventory_transfers (to_warehouse)

WAREHOUSE_STOCKS
├── Attributes: id, warehouse_id, product_variant_id
├──              quantity, reserved_quantity
└── Relationships:
    ├─ N:1 with warehouses
    └─ N:1 with product_variants

STOCK_HISTORY
├── Attributes: id, product_variant_id, change_type
├──              quantity, old_quantity, new_quantity, reason
├──              source_type, source_id, admin_id, customer_id
└── Relationships:
    ├─ N:1 with product_variants
    ├─ N:1 with admins
    └─ N:1 with customers

INVENTORY_TRANSFERS
├── Attributes: id, transfer_number✓unique, from_warehouse_id
├──              to_warehouse_id, status, notes, created_by, approved_by
├──              approved_at, shipped_at, received_at
└── Relationships:
    ├─ 1:N with inventory_transfer_items
    ├─ N:1 with warehouses (source)
    ├─ N:1 with warehouses (destination)
    └─ N:1 with admins (creator/approver)

INVENTORY_TRANSFER_ITEMS
├── Attributes: id, inventory_transfer_id, product_variant_id
├──              quantity, received_quantity
└── Relationships:
    ├─ N:1 with inventory_transfers
    └─ N:1 with product_variants
```

#### Group 9: Returns & Refunds
```
Returns Management System

RETURNS
├── Attributes: id, return_number✓unique, order_id, customer_id
├──              status(requested/approved/rejected/received/processed)
├──              type(refund/replacement/store_credit), reason, notes
├──              refund_amount, refund_payment_id
├──              requested_at, approved_at, received_at, processed_at
└── Relationships:
    ├─ N:1 with orders
    ├─ N:1 with customers
    ├─ N:1 with payments (refund_payment)
    └─ 1:N with return_items

RETURN_ITEMS
├── Attributes: id, return_id, order_item_id, quantity
├──              condition(unopened/opened/damaged/defective)
├──              reason, refund_amount
└── Relationships:
    ├─ N:1 with returns
    └─ N:1 with order_items
```

#### Group 10: Reviews & Ratings
```
Product Reviews & Ratings

PRODUCT_REVIEWS
├── Attributes: id, product_id, product_variant_id, customer_id
├──              admin_id, order_item_id, rating(1-5)
├──              title, comment, status(pending/approved/rejected)
├──              is_verified, is_featured, is_admin_review
├──              helpful_count, not_helpful_count
└── Relationships:
    ├─ N:1 with products
    ├─ N:1 with product_variants
    ├─ N:1 with customers
    ├─ N:1 with admins
    ├─ N:1 with order_items
    ├─ 1:N with review_images
    ├─ 1:N with review_votes
    └─ 1:N with notifications

REVIEW_IMAGES
├── Attributes: id, product_review_id, media_id, sort_order
└── Relationships:
    ├─ N:1 with product_reviews
    └─ N:1 with media

REVIEW_VOTES
├── Attributes: id, product_review_id, customer_id, session_id
├──              vote(helpful/not_helpful)
└── Relationships:
    ├─ N:1 with product_reviews
    └─ N:1 with customers
```

---

## Module Breakdown

### 1. Catalog Module
**Responsibility**: Manage products, categories, brands, attributes

**Key Components**:
- Product CRUD operations
- Category hierarchy with nested categories
- Brand management
- Attribute system (color, size, text, etc.)
- Product variants (different SKUs)
- Specifications (technical details)
- Media attachment

**Data Tables**:
- `products`, `product_variants`, `variant_attributes`
- `categories`, `category_hierarchies`, `category_product`
- `brands`, `tags`, `attributes`, `attribute_values`
- `specifications`, `specification_groups`, `specification_values`
- `media`, `variant_images`

---

### 2. Shopping Module
**Responsibility**: Shopping experience (cart, wishlist, search)

**Key Components**:
- Shopping cart management
- Cart calculations (tax, discounts, shipping)
- Wishlist functionality
- Product search and filtering
- Product recommendations

**Data Tables**:
- `carts`, `cart_items`
- `wishlists`, `wishlist_items`
- `products` (search via full-text index)

---

### 3. Order & Checkout Module
**Responsibility**: Order creation and fulfillment

**Key Components**:
- Order creation from cart
- Address validation
- Shipping method selection
- Tax calculation
- Offer/coupon application
- Order status tracking

**Data Tables**:
- `orders`, `order_items`, `order_status_history`
- `customer_addresses`, `currencies`
- `shipping_methods`, `shipping_zones`, `shipping_charges`
- `tax_classes`, `tax_rates`

---

### 4. Payment Module
**Responsibility**: Payment processing

**Key Components**:
- Payment method management
- Razorpay gateway integration
- Payment status tracking
- Refund processing
- Payment attempt history

**Data Tables**:
- `payments`, `payment_attempts`, `payment_methods`
- `transactions` (implicit in payment records)

---

### 5. Inventory Module
**Responsibility**: Stock management across warehouses

**Key Components**:
- Multi-warehouse inventory
- Stock level tracking
- Inventory reservations for carts
- Inventory transfers between warehouses
- Low stock alerts
- Stock history audit trail

**Data Tables**:
- `product_variants` (stock_quantity, reserved_quantity)
- `warehouses`, `warehouse_stocks`
- `inventory_transfers`, `inventory_transfer_items`
- `stock_history`

---

### 6. Customer Module
**Responsibility**: Customer data and profiles

**Key Components**:
- Customer registration and authentication
- Profile management
- Address management
- Customer segmentation
- Activity tracking

**Data Tables**:
- `customers`, `customer_addresses`
- `customer_segments`, `customer_segment_members`
- `password_histories`

---

### 7. Promotion Module
**Responsibility**: Discounts, offers, coupons

**Key Components**:
- Offer creation and management
- Discount calculation
- BOGO offers
- Coupon codes
- Offer usage tracking
- Auto-apply vs manual application

**Data Tables**:
- `offers`, `offer_usages`, `offer_variants`
- `offer_categories`, `offer_rewards`
- `tier_prices` (for volume discounts)

---

### 8. Loyalty Module
**Responsibility**: Loyalty points and rewards

**Key Components**:
- Loyalty program setup
- Points earning on purchases
- Points redemption
- Tier levels
- Loyalty transaction history

**Data Tables**:
- `loyalty_programs`, `customer_loyalty`
- `loyalty_transactions`

---

### 9. Notification Module
**Responsibility**: Customer communications

**Key Components**:
- Email notifications
- SMS notifications
- Push notifications
- In-app notifications
- Notification templates
- Notification history

**Data Tables**:
- `notifications`, `notification_templates`
- `email_logs`, `sms_logs`

---

### 10. Support & Returns Module
**Responsibility**: Returns and refund management

**Key Components**:
- Return request creation
- Return approval workflow
- Item inspection and condition tracking
- Refund processing
- Return history

**Data Tables**:
- `returns`, `return_items`
- `shipments`, `shipment_items`

---

### 11. Analytics & Reports Module
**Responsibility**: Business intelligence

**Key Components**:
- Sales analytics
- Customer analytics
- Inventory analytics
- Payment analytics
- Activity logging

**Data Tables**:
- `activity_logs`, `audit_trails`
- All transactional tables (for aggregations)

---

### 12. Settings & Configuration Module
**Responsibility**: System configuration

**Key Components**:
- Store settings
- Currency management
- Tax configuration
- Email templates
- General preferences

**Data Tables**:
- `settings`, `currencies`
- `tax_classes`, `tax_rates`
- `notification_templates`

---

## API Architecture

### API Structure

```
BASE_URL: /api/v1

├── Customer API (customer_api.php)
│   ├─ /auth (register, login, logout)
│   ├─ /products (browse, search, filter)
│   ├─ /cart (add, update, remove, view)
│   ├─ /checkout (validate, place order)
│   ├─ /orders (view orders, track shipment)
│   ├─ /account (profile, addresses, preferences)
│   ├─ /reviews (post review, view reviews)
│   ├─ /wishlist (add, remove favorites)
│   ├─ /loyalty (view points, rewards)
│   └─ /notifications (view history)
│
└── Admin API (admin_api.php)
    ├─ /products (CRUD operations)
    ├─ /categories (manage categories)
    ├─ /orders (manage orders, view details)
    ├─ /payments (process refunds, view logs)
    ├─ /shipments (update tracking, create shipments)
    ├─ /customers (manage customer data)
    ├─ /offers (create, edit, delete offers)
    ├─ /inventory (stock management, transfers)
    ├─ /reports (analytics, dashboards)
    ├─ /settings (configuration)
    └─ /audit (view audit logs)
```

### Authentication
- **Type**: Token-based (Laravel Sanctum)
- **Headers**: `Authorization: Bearer {token}`
- **Flow**: Login → Receive token → Use for authenticated requests

### Response Format
```json
{
  "status": "success|error", 
  "message": "Description",
  "data": { /* payload */ },
  "errors": { /* validation errors */ },
  "meta": { "pagination": { "page": 1, "per_page": 15, "total": 100 } }
}
```

---

## Database Design

### Design Principles

1. **Normalization**: 3NF (Third Normal Form) for OLTP operations
2. **Denormalization**: Strategic JSONB fields for flexible data (product attributes, order addresses)
3. **Indexing**: Composite indices on frequently queried column combinations
4. **Partitioning**: Optional time-based partitioning for large tables (orders, payments, activity_logs)
5. **Foreign Keys**: Enforced with ON DELETE cascade/set null policies

### Performance Considerations

**Indexed Columns**:
- `products.slug` - URL lookups
- `orders.order_number`, `orders.customer_id`, `orders.created_at`
- `product_variants.product_id`, `sku`
- `cart_items.cart_id`, `product_variant_id`
- `customer_addresses.customer_id`
- `orders.payment_status`, `orders.shipping_status`

**Full-Text Indices**:
- `products(name, short_description, description)` - Product search

**Composite Indices**:
- `orders(customer_id, created_at)` - Customer order history
- `cart_items(cart_id, product_variant_id)` - Cart lookups
- `product_variants(product_id, is_default)` - Default variant fetch

### Storage Engines
- **Primary**: InnoDB (transactions, foreign keys, ACID compliance)
- **Justification**:
  - ACID compliance for financial transactions
  - Support for foreign key constraints
  - Crash recovery
  - Row-level locking for concurrent operations

### Backup & Recovery Strategy

- **Full Backup**: Daily (AWS RDS automated backups)
- **Incremental Backup**: Hourly (binary logs)
- **Recovery Point Objective (RPO)**: 1 hour
- **Recovery Time Objective (RTO)**: 30 minutes
- **Replication**: Master-slave for high availability

### Scalability Approach

**Read Scaling**:
- Database replication (read replicas)
- Redis caching for frequently accessed data
- Query optimization with indices

**Write Scaling**:
- Connection pooling
- Asynchronous operations via queues
- Sharding (future: by customer_id or geography)

---

## Conclusion

DrKinjal is a comprehensive, enterprise-grade e-commerce platform built with Laravel 12. It incorporates modern development practices, scalable architecture, and robust data management to support growing online retail businesses. The system is designed for flexibility, reliability, and high performance across all operational aspects of e-commerce.

For detailed implementation guides, API documentation, and deployment instructions, refer to the specific module documentation files.
