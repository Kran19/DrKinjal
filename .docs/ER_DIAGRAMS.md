# DrKinjal - Entity Relationship Diagram (ER) - Complete Reference

## Master ER Diagram Overview

```mermaid
erDiagram
    CUSTOMERS ||--o{ CUSTOMER_ADDRESSES : has
    CUSTOMERS ||--o{ CUSTOMER_LOYALTY : joins
    CUSTOMERS ||--o{ CARTS : creates
    CUSTOMERS ||--o{ ORDERS : places
    CUSTOMERS ||--o{ PRODUCT_REVIEWS : writes
    CUSTOMERS ||--o{ WISHLIST_ITEMS : adds
    CUSTOMERS ||--o{ GIFT_CARDS : purchases
    
    PRODUCTS ||--o{ PRODUCT_VARIANTS : contains
    PRODUCTS ||--o{ PRODUCT_REVIEWS : receives
    PRODUCTS ||--o{ PRODUCT_SPECIFICATIONS : has
    PRODUCTS ||--o{ RELATED_PRODUCTS : relates_to
    PRODUCTS ||--o{ CROSS_SELL_PRODUCTS : cross_sells
    PRODUCTS ||--o{ UPSELL_PRODUCTS : upsells
    PRODUCTS ||--o{ CATEGORY_PRODUCT : belongs_to
    PRODUCTS ||--o{ OFFER_REWARDS : rewards
    PRODUCTS ||--o{ PRICE_HISTORIES : tracks
    
    PRODUCT_VARIANTS ||--o{ VARIANT_ATTRIBUTES : has
    PRODUCT_VARIANTS ||--o{ VARIANT_IMAGES : displays
    PRODUCT_VARIANTS ||--o{ CART_ITEMS : adds_to_cart
    PRODUCT_VARIANTS ||--o{ ORDER_ITEMS : includes_in_order
    PRODUCT_VARIANTS ||--o{ WISHLIST_ITEMS : adds_to_wishlist
    PRODUCT_VARIANTS ||--o{ STOCK_HISTORY : tracks_stock
    PRODUCT_VARIANTS ||--o{ WAREHOUSE_STOCKS : inventories
    PRODUCT_VARIANTS ||--o{ TIER_PRICES : prices
    PRODUCT_VARIANTS ||--o{ OFFER_VARIANTS : applies_offer
    
    CATEGORIES ||--o{ PRODUCTS : contains
    CATEGORIES ||--o{ CATEGORY_ATTRIBUTES : requires
    CATEGORIES ||--o{ CATEGORY_SPEC_GROUPS : has_specs
    CATEGORIES ||--o{ CATEGORY_PRODUCT : assigns
    CATEGORIES ||--o{ OFFER_CATEGORIES : applies
    
    ATTRIBUTES ||--o{ ATTRIBUTE_VALUES : contains
    ATTRIBUTES ||--o{ VARIANT_ATTRIBUTES : specifies
    ATTRIBUTES ||--o{ CATEGORY_ATTRIBUTES : required_by
    
    OFFERS ||--o{ OFFER_USAGES : tracks
    OFFERS ||--o{ OFFER_VARIANTS : includes_products
    OFFERS ||--o{ OFFER_CATEGORIES : includes_categories
    OFFERS ||--o{ OFFER_REWARDS : rewards
    
    CARTS ||--o{ CART_ITEMS : contains
    ORDERS ||--o{ ORDER_ITEMS : contains
    ORDERS ||--o{ ORDER_STATUS_HISTORY : tracks
    ORDERS ||--o{ SHIPMENTS : ships_via
    ORDERS ||--o{ PAYMENTS : receives
    ORDERS ||--o{ RETURNS : allows_return
    
    SHIPMENTS ||--o{ SHIPMENT_ITEMS : includes
    RETURNS ||--o{ RETURN_ITEMS : requests_return
    
    PAYMENTS ||--o{ PAYMENT_ATTEMPTS : attempts
    
    WAREHOUSES ||--o{ WAREHOUSE_STOCKS : stores
    WAREHOUSES ||--o{ INVENTORY_TRANSFERS : transfers_from
    INVENTORY_TRANSFERS ||--o{ INVENTORY_TRANSFER_ITEMS : transfers
    
    LOYALTY_PROGRAMS ||--o{ CUSTOMER_LOYALTY : enrolls
    CUSTOMER_LOYALTY ||--o{ LOYALTY_TRANSACTIONS : earns
    
    BRANDS ||--o{ PRODUCTS : manufactures
    TAGS ||--o{ PRODUCTS : tags
    
    PRODUCT_REVIEWS ||--o{ REVIEW_IMAGES : includes
    PRODUCT_REVIEWS ||--o{ REVIEW_VOTES : receives
```

---

## Detailed Entity Groups - Visual Representations

### Group 1: User & Authentication

```mermaid
erDiagram
    ADMINS {
        bigint id PK
        string name
        string email UK
        string password
        enum role
        tinyint status
        timestamp password_changed_at
        timestamp last_login_at
        ipaddress last_login_ip
        timestamp created_at
        timestamp updated_at
    }
    
    CUSTOMERS {
        bigint id PK
        string name
        string email UK "nullable"
        string mobile UK "nullable"
        string password
        tinyint status
        timestamp email_verified_at
        timestamp mobile_verified_at
        timestamp password_changed_at
        timestamp last_login_at
        ipaddress last_login_ip
        timestamp created_at
        timestamp updated_at
    }
    
    PASSWORD_HISTORIES {
        bigint id PK
        string user_type
        bigint user_id
        string password_hash
        timestamp created_at
    }
    
    ADMINS ||--o{ PASSWORD_HISTORIES : creates
    CUSTOMERS ||--o{ PASSWORD_HISTORIES : creates
```

### Group 2: Product Catalog

```mermaid
erDiagram
    PRODUCTS {
        bigint id PK
        string name
        string slug UK
        enum product_type "simple|configurable|bundle"
        bigint brand_id FK
        bigint main_category_id FK
        bigint tax_class_id FK
        text short_description
        longtext description
        enum status "draft|active|inactive"
        tinyint is_featured
        tinyint is_new
        tinyint is_bestseller
        decimal weight
        decimal length
        decimal width
        decimal height
        string meta_title
        string meta_description
        string product_code UK "nullable"
        timestamp created_at
        timestamp updated_at
    }
    
    PRODUCT_VARIANTS {
        bigint id PK
        bigint product_id FK
        string sku UK
        string combination_hash UK "nullable"
        decimal price
        decimal compare_price "nullable"
        decimal cost_price "nullable"
        integer stock_quantity
        integer reserved_quantity
        enum stock_status "in_stock|out_of_stock|backorder"
        tinyint is_default
        tinyint status
        decimal weight
        timestamp created_at
    }
    
    BRANDS {
        bigint id PK
        string name
        string slug UK
        text description
        bigint logo_id FK
        tinyint status
        integer sort_order
        timestamp created_at
    }
    
    CATEGORIES {
        bigint id PK
        bigint parent_id FK "self"
        string name
        string slug UK
        text description
        tinyint status
        tinyint featured
        tinyint show_in_nav
        integer sort_order
        bigint image_id FK
        string meta_title
        timestamp created_at
    }
    
    TAGS {
        bigint id PK
        string name
        string slug UK
        tinyint status
        timestamp created_at
    }
    
    ATTRIBUTES {
        bigint id PK
        string name
        string code UK
        enum type "select|color|image|text"
        tinyint is_variant
        tinyint is_filterable
        integer sort_order
        tinyint status
        timestamp created_at
    }
    
    ATTRIBUTE_VALUES {
        bigint id PK
        bigint attribute_id FK
        string value
        string label
        string color_code "nullable"
        bigint image_id FK "nullable"
        integer sort_order
        tinyint status
        timestamp created_at
    }
    
    PRODUCTS ||--o{ PRODUCT_VARIANTS : contains
    PRODUCTS ||--o{ BRANDS : belongs_to
    PRODUCTS ||--o{ CATEGORIES : categorized_by
    PRODUCT_VARIANTS ||--o{ ATTRIBUTES : described_by
    CATEGORIES ||--o{ PRODUCTS : contains_products
    BRANDS ||--o{ PRODUCTS : manufactures
    ATTRIBUTES ||--o{ ATTRIBUTE_VALUES : has_values
```

### Group 3: Shopping & Cart

```mermaid
erDiagram
    CARTS {
        bigint id PK
        bigint customer_id FK "nullable"
        string session_id "nullable"
        bigint currency_id FK "nullable"
        enum status "active|abandoned|converted"
        decimal subtotal
        decimal tax_total
        decimal shipping_total
        decimal discount_total
        decimal grand_total
        bigint offer_id FK "nullable"
        bigint shipping_address_id FK "nullable"
        bigint billing_address_id FK "nullable"
        timestamp abandoned_at "nullable"
        timestamp created_at
    }
    
    CART_ITEMS {
        bigint id PK
        bigint cart_id FK
        bigint product_variant_id FK
        integer quantity
        decimal unit_price
        decimal total
        decimal discount_amount
        bigint offer_id FK "nullable"
        json attributes "nullable"
        timestamp created_at
    }
    
    WISHLISTS {
        bigint id PK
        bigint customer_id FK
        string name
        tinyint is_public
        timestamp created_at
    }
    
    WISHLIST_ITEMS {
        bigint id PK
        bigint wishlist_id FK
        bigint product_variant_id FK
        timestamp created_at
    }
    
    CARTS ||--o{ CART_ITEMS : contains
    WISHLISTS ||--o{ WISHLIST_ITEMS : contains
    CUSTOMERS ||--o{ CARTS : has_cart
    CUSTOMERS ||--o{ WISHLISTS : has_wishlist
```

### Group 4: Orders & Payments

```mermaid
erDiagram
    ORDERS {
        bigint id PK
        string order_number UK
        bigint customer_id FK "nullable"
        bigint shipping_method_id FK "nullable"
        bigint payment_method_id FK "nullable"
        bigint currency_id FK "nullable"
        enum status "pending|confirmed|processing|shipped|delivered"
        enum payment_status "pending|paid|failed|refunded"
        enum shipping_status "pending|processing|shipped|delivered"
        decimal subtotal
        decimal tax_total
        decimal shipping_total
        decimal discount_total
        decimal grand_total
        bigint offer_id FK "nullable"
        decimal loyalty_points_used
        decimal loyalty_points_earned
        json shipping_address
        json billing_address
        text customer_notes
        text admin_notes
        timestamp confirmed_at
        timestamp shipped_at
        timestamp delivered_at
        timestamp created_at
    }
    
    ORDER_ITEMS {
        bigint id PK
        bigint order_id FK
        bigint product_variant_id FK
        string product_name
        string sku
        integer quantity
        decimal unit_price
        decimal compare_price
        decimal total
        decimal discount_amount
        json attributes
        bigint offer_id FK "nullable"
        decimal loyalty_points
        timestamp created_at
    }
    
    ORDER_STATUS_HISTORY {
        bigint id PK
        bigint order_id FK
        string status
        text notes
        bigint admin_id FK "nullable"
        timestamp created_at
    }
    
    PAYMENTS {
        bigint id PK
        bigint order_id FK
        bigint payment_method_id FK
        string transaction_id UK "nullable"
        decimal amount
        bigint currency_id FK "nullable"
        string payment_gateway "nullable"
        enum status "pending|processing|completed|failed"
        json request_data
        json response_data
        text failure_reason
        timestamp paid_at
        timestamp created_at
    }
    
    PAYMENT_ATTEMPTS {
        bigint id PK
        bigint order_id FK
        bigint payment_method_id FK
        string attempt_id UK
        decimal amount
        enum status "initiated|failed|success"
        json gateway_response
        timestamp created_at
    }
    
    PAYMENT_METHODS {
        bigint id PK
        string name
        string code UK
        tinyint is_active
        json config
        integer sort_order
        timestamp created_at
    }
    
    ORDERS ||--o{ ORDER_ITEMS : contains_items
    ORDERS ||--o{ ORDER_STATUS_HISTORY : has_history
    ORDERS ||--o{ PAYMENTS : receives_payment
    ORDERS ||--o{ PAYMENT_ATTEMPTS : attempts_payment
    PAYMENTS ||--o{ PAYMENT_ATTEMPTS : creates_attempts
    CUSTOMERS ||--o{ ORDERS : places_order
```

### Group 5: Inventory & Warehouses

```mermaid
erDiagram
    WAREHOUSES {
        bigint id PK
        string name
        string code UK
        string address
        string city
        string state
        string country
        string pincode
        string contact_person
        string contact_number
        tinyint is_default
        tinyint is_active
        timestamp created_at
    }
    
    WAREHOUSE_STOCKS {
        bigint id PK
        bigint warehouse_id FK
        bigint product_variant_id FK
        integer quantity
        integer reserved_quantity
        timestamp created_at
    }
    
    STOCK_HISTORY {
        bigint id PK
        bigint product_variant_id FK
        enum change_type "increase|decrease|adjustment|transfer"
        integer quantity
        integer old_quantity
        integer new_quantity
        string reason
        string source_type
        bigint source_id
        bigint admin_id FK "nullable"
        bigint customer_id FK "nullable"
        text notes
        timestamp created_at
    }
    
    INVENTORY_TRANSFERS {
        bigint id PK
        string transfer_number UK
        bigint from_warehouse_id FK
        bigint to_warehouse_id FK
        enum status "pending|approved|in_transit|received"
        text notes
        bigint created_by FK
        bigint approved_by FK
        timestamp approved_at
        timestamp shipped_at
        timestamp received_at
        timestamp created_at
    }
    
    INVENTORY_TRANSFER_ITEMS {
        bigint id PK
        bigint inventory_transfer_id FK
        bigint product_variant_id FK
        integer quantity
        integer received_quantity
        timestamp created_at
    }
    
    WAREHOUSES ||--o{ WAREHOUSE_STOCKS : stores
    WAREHOUSES ||--o{ INVENTORY_TRANSFERS : origin
    PRODUCT_VARIANTS ||--o{ WAREHOUSE_STOCKS : inventoried
    PRODUCT_VARIANTS ||--o{ STOCK_HISTORY : tracks
    INVENTORY_TRANSFERS ||--o{ INVENTORY_TRANSFER_ITEMS : contains
```

### Group 6: Shipments & Returns

```mermaid
erDiagram
    SHIPMENTS {
        bigint id PK
        bigint order_id FK
        string tracking_number UK "nullable"
        string carrier
        string carrier_service
        enum status "pending|processing|shipped|delivered"
        decimal weight
        json dimensions
        json shipping_label
        timestamp shipped_at
        timestamp estimated_delivery
        timestamp delivered_at
        text delivery_notes
        timestamp created_at
    }
    
    SHIPMENT_ITEMS {
        bigint id PK
        bigint shipment_id FK
        bigint order_item_id FK
        integer quantity
        timestamp created_at
    }
    
    RETURNS {
        bigint id PK
        string return_number UK
        bigint order_id FK
        bigint customer_id FK
        enum status "requested|approved|rejected|received|processed"
        enum type "refund|replacement|store_credit"
        string reason
        text notes
        decimal refund_amount
        bigint refund_payment_id FK "nullable"
        timestamp requested_at
        timestamp approved_at
        timestamp received_at
        timestamp processed_at
        timestamp created_at
    }
    
    RETURN_ITEMS {
        bigint id PK
        bigint return_id FK
        bigint order_item_id FK
        integer quantity
        enum condition "unopened|opened|damaged"
        text reason
        decimal refund_amount
        timestamp created_at
    }
    
    SHIPPING_METHODS {
        bigint id PK
        string name
        string code UK
        text description
        tinyint is_active
        json config
        integer sort_order
        timestamp created_at
    }
    
    SHIPPING_ZONES {
        bigint id PK
        string name
        json countries
        json states
        json zip_codes
        tinyint is_active
        timestamp created_at
    }
    
    SHIPPING_CHARGES {
        bigint id PK
        bigint shipping_zone_id FK
        bigint shipping_method_id FK
        decimal min_weight
        decimal max_weight
        decimal min_price
        decimal max_price
        decimal charge
        decimal free_shipping_threshold
        tinyint is_active
        timestamp created_at
    }
    
    ORDERS ||--o{ SHIPMENTS : ships_via
    SHIPMENTS ||--o{ SHIPMENT_ITEMS : contains
    ORDERS ||--o{ RETURNS : allows_return
    RETURNS ||--o{ RETURN_ITEMS : requests
    SHIPPING_ZONES ||--o{ SHIPPING_CHARGES : defines
    SHIPPING_METHODS ||--o{ SHIPPING_CHARGES : uses
```

### Group 7: Promotions & Loyalty

```mermaid
erDiagram
    OFFERS {
        bigint id PK
        string name
        string code UK "nullable"
        tinyint status
        enum offer_type "percentage|fixed|bogo|buy_x_get_y"
        decimal discount_value
        integer buy_qty
        integer get_qty
        decimal min_cart_amount
        decimal max_cart_amount
        decimal max_discount
        integer max_uses
        integer uses_per_customer
        integer used_count
        timestamp starts_at
        timestamp ends_at
        tinyint is_auto_apply
        tinyint is_stackable
        bigint customer_segment_id FK "nullable"
        timestamp created_at
    }
    
    OFFER_USAGES {
        bigint id PK
        bigint offer_id FK
        bigint customer_id FK "nullable"
        bigint order_id FK "nullable"
        decimal discount_amount
        timestamp used_at
        timestamp created_at
    }
    
    OFFER_VARIANTS {
        bigint id PK
        bigint offer_id FK
        bigint product_variant_id FK
        timestamp created_at
    }
    
    OFFER_CATEGORIES {
        bigint id PK
        bigint offer_id FK
        bigint category_id FK
        timestamp created_at
    }
    
    OFFER_REWARDS {
        bigint id PK
        bigint offer_id FK
        bigint reward_product_id FK
        bigint reward_variant_id FK "nullable"
        integer reward_qty
        timestamp created_at
    }
    
    LOYALTY_PROGRAMS {
        bigint id PK
        string name
        string slug UK
        decimal points_per_currency
        integer signup_bonus
        integer first_purchase_bonus
        decimal min_redeemable_points
        decimal point_value
        timestamp starts_at
        timestamp ends_at
        tinyint status
        timestamp created_at
    }
    
    CUSTOMER_LOYALTY {
        bigint id PK
        bigint customer_id FK
        bigint loyalty_program_id FK
        decimal total_points
        decimal available_points
        decimal used_points
        decimal expired_points
        integer tier_level
        timestamp created_at
    }
    
    LOYALTY_TRANSACTIONS {
        bigint id PK
        bigint customer_loyalty_id FK
        enum type "earn|redeem|expire|adjust|bonus"
        decimal points
        decimal balance
        string reference_type
        bigint reference_id
        text notes
        timestamp created_at
    }
    
    OFFERS ||--o{ OFFER_USAGES : tracks
    OFFERS ||--o{ OFFER_VARIANTS : includes
    OFFERS ||--o{ OFFER_CATEGORIES : applies_to
    OFFERS ||--o{ OFFER_REWARDS : rewards_with
    LOYALTY_PROGRAMS ||--o{ CUSTOMER_LOYALTY : enrolls
    CUSTOMER_LOYALTY ||--o{ LOYALTY_TRANSACTIONS : records
```

### Group 8: Reviews & Ratings

```mermaid
erDiagram
    PRODUCT_REVIEWS {
        bigint id PK
        bigint product_id FK
        bigint product_variant_id FK "nullable"
        bigint customer_id FK "nullable"
        bigint admin_id FK "nullable"
        bigint order_item_id FK "nullable"
        tinyint rating
        string title
        text comment
        enum status "pending|approved|rejected"
        tinyint is_verified
        tinyint is_featured
        tinyint is_admin_review
        integer helpful_count
        integer not_helpful_count
        timestamp created_at
    }
    
    REVIEW_IMAGES {
        bigint id PK
        bigint product_review_id FK
        bigint media_id FK
        integer sort_order
        timestamp created_at
    }
    
    REVIEW_VOTES {
        bigint id PK
        bigint product_review_id FK
        bigint customer_id FK "nullable"
        string session_id
        enum vote "helpful|not_helpful"
        timestamp created_at
    }
    
    MEDIA {
        bigint id PK
        string file_name
        string file_path
        string disk
        string mime_type
        enum file_type "image|video|document"
        bigint file_size
        json thumbnails
        json metadata
        string alt_text
        timestamp created_at
    }
    
    PRODUCTS ||--o{ PRODUCT_REVIEWS : receives
    PRODUCT_REVIEWS ||--o{ REVIEW_IMAGES : includes
    PRODUCT_REVIEWS ||--o{ REVIEW_VOTES : receives_votes
    REVIEW_IMAGES ||--o{ MEDIA : uses_media
```

### Group 9: Customer Data

```mermaid
erDiagram
    CUSTOMERS {
        bigint id PK
        string name
        string email
        string mobile
        string password
        tinyint status
        timestamp email_verified_at
        timestamp mobile_verified_at
        timestamp created_at
    }
    
    CUSTOMER_ADDRESSES {
        bigint id PK
        bigint customer_id FK
        enum type "shipping|billing|both"
        string name
        string mobile
        text address
        string city
        string state
        string country
        string pincode
        decimal latitude
        decimal longitude
        tinyint is_default
        timestamp created_at
    }
    
    CUSTOMER_SEGMENTS {
        bigint id PK
        string name
        string slug UK
        json conditions
        integer customer_count
        tinyint is_active
        timestamp created_at
    }
    
    CUSTOMER_SEGMENT_MEMBERS {
        bigint id PK
        bigint customer_id FK
        bigint customer_segment_id FK
        timestamp added_at
    }
    
    GIFT_CARDS {
        bigint id PK
        string code UK
        decimal initial_value
        decimal current_value
        bigint currency_id FK "nullable"
        bigint purchased_by FK "nullable"
        bigint recipient_id FK "nullable"
        string recipient_email
        string recipient_name
        text message
        enum status "active|used|expired"
        timestamp expires_at
        timestamp created_at
    }
    
    GIFT_CARD_TRANSACTIONS {
        bigint id PK
        bigint gift_card_id FK
        decimal amount
        decimal balance_before
        decimal balance_after
        string reference_type
        bigint reference_id
        text notes
        timestamp created_at
    }
    
    CUSTOMERS ||--o{ CUSTOMER_ADDRESSES : has_address
    CUSTOMERS ||--o{ CUSTOMER_SEGMENT_MEMBERS : joins
    CUSTOMER_SEGMENTS ||--o{ CUSTOMER_SEGMENT_MEMBERS : contains
    CUSTOMERS ||--o{ GIFT_CARDS : purchases
    GIFT_CARDS ||--o{ GIFT_CARD_TRANSACTIONS : tracks
    CUSTOMERS ||--o{ GIFT_CARDS : receives
```

### Group 10: Pricing & Tax

```mermaid
erDiagram
    PRODUCT_VARIANTS {
        bigint id PK
        decimal price
        decimal compare_price
        decimal cost_price
    }
    
    PRICE_HISTORIES {
        bigint id PK
        bigint product_variant_id FK
        decimal old_price
        decimal new_price
        decimal old_compare_price
        decimal new_compare_price
        bigint changed_by FK
        string change_reason
        timestamp effective_from
        timestamp effective_to
        timestamp created_at
    }
    
    TIER_PRICES {
        bigint id PK
        bigint product_variant_id FK
        integer min_quantity
        integer max_quantity
        decimal price
        enum customer_group "all|guest|registered|wholesale"
        bigint customer_segment_id FK
        timestamp starts_at
        timestamp ends_at
        timestamp created_at
    }
    
    TAX_CLASSES {
        bigint id PK
        string name
        string code UK
        text description
        tinyint is_default
        timestamp created_at
    }
    
    TAX_RATES {
        bigint id PK
        bigint tax_class_id FK
        string name
        string country_code
        string state_code
        string zip_code
        decimal rate
        tinyint is_active
        integer priority
        timestamp created_at
    }
    
    CURRENCIES {
        bigint id PK
        string code UK
        string name
        string symbol
        decimal exchange_rate
        tinyint is_default
        tinyint is_active
        integer decimal_places
        timestamp created_at
    }
    
    PRODUCT_VARIANTS ||--o{ PRICE_HISTORIES : tracks
    PRODUCT_VARIANTS ||--o{ TIER_PRICES : has_pricing
    TIER_PRICES ||--o{ CUSTOMER_SEGMENTS : applies_to
    TAX_CLASSES ||--o{ TAX_RATES : defines
    PRODUCTS ||--o{ TAX_CLASSES : classified_by
```

---

## Relationships Summary

### One-to-Many (1:N)
- **Products ↔ Product Variants**: One product has many SKU variants
- **Categories ↔ Products**: One category contains many products
- **Customers ↔ Orders**: One customer places many orders
- **Orders ↔ Order Items**: One order contains many items
- **Warehouses ↔ Warehouse Stocks**: One warehouse manages stock of many products
- **Offers ↔ Offer Usages**: One offer is used many times

### Many-to-Many (N:M)
- **Products ↔ Categories**: Through `category_product` pivot table
- **Products ↔ Tags**: Through `product_tags` pivot table
- **Attributes ↔ Categories**: Through `category_attributes` pivot table
- **Attributes ↔ Variants**: Through `variant_attributes` pivot table
- **Offers ↔ Products**: Through `offer_variants` pivot table
- **Offers ↔ Categories**: Through `offer_categories` pivot table

### Self-Referencing
- **Categories ↔ Categories**: Parent-child hierarchy via `parent_id`
- **Products ↔ Products**: Related, cross-sell, upsell products

### Polymorphic
- **Password Histories**: Stores passwords for both Admins and Customers
- **Notifications**: Notifies different entity types (customers, admins)
- **Activity Logs**: Tracks changes by different user types

---

## Data Integrity & Constraints

### Unique Constraints
```
- customers(email)
- customers(mobile)
- product_variants(sku)
- products(slug)
- categories(slug)
- offers(code)
- gift_cards(code)
- currencies(code)
- tax_classes(code)
- shipping_methods(code)
- brands(slug)
- tags(slug)
```

### Foreign Key Constraints
All foreign keys follow CASCADE or SET NULL policies:
- **CASCADE**: When parent deleted, delete child records
  - products → product_variants
  - categories → products
  - orders → order_items, order_status_history
  
- **SET NULL**: When parent deleted, set foreign key to NULL
  - products.brand_id
  - products.main_category_id
  - payment_attempts.payment_method_id
  - collection → collection_category

### Check Constraints (Implicit)
- `price` ≥ 0
- `quantity` ≥ 0
- `rating` BETWEEN 1 AND 5
- `status` IN (predefined enum values)

---

## Database Statistics

| Category | Count | Tables |
|----------|-------|--------|
| **Catalog** | 16 | products, variants, categories, attributes, specs |
| **Transaction** | 14 | orders, payments, shipments, returns |
| **Customer** | 5 | customers, addresses, segments, loyalty |
| **Inventory** | 7 | warehouses, warehouse_stocks, transfers, stock_history |
| **Promotion** | 7 | offers, tiers, loyalty_programs, gift_cards |
| **Content** | 10 | media, reviews, notifications, pages, settings |
| **Admin** | 5 | activity_logs, audit_trails, email_logs, sms_logs |
| **Support** | 10 | returns, shipments, stock_history, transfers |
| **System** | 5 | settings, currencies, tax_classes, payment_methods |
| **Total** | **79** | **~70+ tables** |

---

## Query Optimization Considerations

### Essential Indices
```sql
CREATE INDEX idx_products_slug ON products(slug);
CREATE INDEX idx_products_status ON products(status);
CREATE INDEX idx_product_variants_sku ON product_variants(sku);
CREATE INDEX idx_product_variants_product_id ON product_variants(product_id);
CREATE INDEX idx_orders_customer_id_created ON orders(customer_id, created_at);
CREATE INDEX idx_orders_status ON orders(status);
CREATE INDEX idx_orders_payment_status ON orders(payment_status);
CREATE INDEX idx_cart_items_cart_id ON cart_items(cart_id);
CREATE INDEX idx_customer_addresses_customer_id ON customer_addresses(customer_id);
CREATE INDEX idx_category_product_product_id ON category_product(product_id);
CREATE INDEX idx_warehouse_stocks_warehouse_id ON warehouse_stocks(warehouse_id);
CREATE INDEX idx_stock_history_variant_id ON stock_history(product_variant_id, created_at);
CREATE FULLTEXT INDEX ft_products_search ON products(name, short_description, description);
```

### Query Patterns
1. **Product browsing**: `products` + `product_variants` + `categories`
2. **Cart operations**: `carts` + `cart_items` + `product_variants`
3. **Order history**: `orders` + `order_items` + `customers`
4. **Inventory check**: `product_variants` + `warehouse_stocks`
5. **Payment tracking**: `orders` + `payments` + `payment_methods`

---

## Schema Evolution Strategy

### Versioning
```
✓ Current Version: 2.0
✓ Created: 2025-12-21
✓ Latest Revision: 2026-02-15
```

### Recent Enhancements
- Added `is_block` to customers (2026-01-12)
- Added `payment_method` to orders (2026-01-11)
- Added `sort_order` to products (2026-01-24)
- Enhanced product dimensions with defaults (2026-01-19)
- Added COD availability flag to products (2026-01-19)

### Future Considerations
- Sharding by `customer_id` or geography
- Time-based partitioning for `orders`, `order_items`
- Materialized views for analytics
- Event sourcing for order lifecycle
- CQRS pattern separation

