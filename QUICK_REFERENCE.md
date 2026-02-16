# DrKinjal - Quick Reference Guide

## 📚 Documentation Index

The complete documentation for the DrKinjal e-commerce platform is organized as follows:

### 1. **DOCUMENTATION.md** - Main System Documentation
   - System overview and capabilities
   - System requirements (hardware, software, PHP extensions)
   - Architecture & methodology (MVC + Service Layer pattern)
   - Module breakdown with responsibilities
   - API architecture
   - Database design principles

### 2. **DFD_DIAGRAMS.md** - Data Flow Diagrams
   - Level 0: System context diagram
   - Level 1: Main process flows
   - Level 2: Detailed process flows
   - Customer journey flowchart
   - Order processing sequence diagram
   - Inventory management flow
   - Payment processing flow
   - Promotional engine flow
   - Notification system flow
   - Loyalty points system flow

### 3. **ER_DIAGRAMS.md** - Entity Relationship Diagrams
   - Master ER diagram overview
   - 10 detailed entity groups with visual representations
   - Relationships summary (1:N, N:M, self-referencing, polymorphic)
   - Data integrity constraints
   - Database statistics
   - Query optimization with indices
   - Schema evolution strategy

---

## 🎯 Key System Characteristics

### Technology Stack
- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Vue.js/React, Tailwind CSS, Vite
- **Database**: MySQL 8.0+, InnoDB
- **Payment**: Razorpay gateway integration
- **Storage**: Local filesystem / AWS S3
- **Caching**: Redis
- **Queue**: Redis / Database queue

### Core Modules (12 Total)
1. **Catalog Module** - Product, category, brand, attribute management
2. **Shopping Module** - Cart, wishlist, search, recommendations
3. **Order & Checkout Module** - Order creation, fulfillment
4. **Payment Module** - Payment processing via Razorpay
5. **Inventory Module** - Multi-warehouse stock management
6. **Customer Module** - Profiles, addresses, segmentation
7. **Promotion Module** - Discounts, offers, coupons
8. **Loyalty Module** - Points, rewards, tiers
9. **Notification Module** - Email, SMS, push, in-app
10. **Support & Returns Module** - Return management
11. **Analytics & Reports Module** - Business intelligence
12. **Settings & Configuration Module** - System setup

---

## 📊 Database Overview

### Table Categories

| Category | Count | Purpose |
|----------|-------|---------|
| Catalog | 16 tables | Product data, categories, attributes, specifications |
| Transaction | 14 tables | Orders, payments, shipments, returns |
| Customer | 5 tables | Customer profiles, addresses, segments |
| Inventory | 7 tables | Warehouse management, stock tracking |
| Promotion | 7 tables | Offers, tier prices, gift cards |
| Content | 10 tables | Media, reviews, notifications |
| Admin | 5 tables | Activity logs, audit trails |
| System | 5 tables | Settings, currencies, tax |
| **Total** | **~79 tables** | **Complete e-commerce system** |

### Key Tables
```
CORE:
  products (1900 lines of schema definition)
  product_variants
  categories
  
TRANSACTION:
  orders
  order_items
  payments
  
CUSTOMER:
  customers
  customer_addresses
  
INVENTORY:
  warehouses
  warehouse_stocks
  stock_history
```

---

## 🔄 Main Data Flows

### 1. Customer Journey Flow
```
Browse Products → Add to Cart → Checkout → Payment → Order Confirmation
                                                            ↓
                                                    Warehouse Fulfillment
                                                            ↓
                                                    Shipment & Tracking
                                                            ↓
                                                    Delivery & Review
```

### 2. Order Processing Pipeline
```
Order Initiated → Validate Cart → Calculate Totals → Create Order
                                                            ↓
                                                    Submit Payment
                                                            ↓
                                          ┌─────────────────┴─────────────────┐
                                          ▼                                   ▼
                                    Payment Success                    Payment Failed
                                          ↓                                   ↓
                                  Reserve Inventory              Retry or Abandon
                                          ↓
                                  Send Confirmation
                                          ↓
                                  Warehouse Alert
                                          ↓
                                  Fulfillment Begins
```

### 3. Inventory Management Flow
```
Stock Received → Update Warehouse → Customer Order → Reserve Items
                                          ↓
                                  Payment Confirmed
                                          ↓
                                  Deduct from Stock
                                          ↓
                        ┌─────────────────┴─────────────────┐
                        ▼                                   ▼
                  Stock Adequate                    Low Stock Alert
                        ↓                                   ▼
                  Proceed Normal                    Alert Admin
                        ↓
        Returns/Reverse Stock ← Restore Qty
```

### 4. Payment Processing Flow
```
Order Ready → Prepare Request → Submit to Razorpay → Customer Enters Details
                                                            ↓
                                              Razorpay → Bank/Card Network
                                                            ↓
                                              ┌─────────────┴─────────────┐
                                              ▼                          ▼
                                        Success                      Failed
                                              ↓                          ▼
                                      Update Status                 Retry Option
                                              ↓
                                    Reduce Inventory
                                              ↓
                                    Add Loyalty Points
                                              ↓
                                    Send Notifications
```

---

## 🏗️ System Architecture

### Architectural Layers
```
┌─────────────────────────────────────────────────────┐
│  Frontend Layer (SPA - Vue.js/React)                │
└──────────┬──────────────────────────────────────────┘
           │ HTTP/REST API
┌──────────▼──────────────────────────────────────────┐
│  API Controller Layer                               │
│  - Routes, Validation, Response Format              │
└──────────┬──────────────────────────────────────────┘
           │
┌──────────▼──────────────────────────────────────────┐
│  Service Layer (Business Logic)                     │
│  - CartService, OrderService, PaymentService, etc  │
└──────────┬──────────────────────────────────────────┘
           │
┌──────────▼──────────────────────────────────────────┐
│  Eloquent ORM Models                                │
│  - Database abstraction, relationships              │
└──────────┬──────────────────────────────────────────┘
           │
┌──────────▼──────────────────────────────────────────┐
│  Database Layer (MySQL/InnoDB)                      │
│  - Tables, indices, foreign keys                    │
└─────────────────────────────────────────────────────┘
```

### Design Patterns
- **MVC Pattern** - Separation of concerns
- **Repository Pattern** - Data access abstraction
- **Service Pattern** - Business logic encapsulation
- **Factory Pattern** - Object creation
- **Observer Pattern** - Event-driven operations
- **Strategy Pattern** - Multiple algorithms (payment, shipping)
- **Dependency Injection** - Loose coupling

---

## 🔐 Security Considerations

### Authentication & Authorization
- **User Types**: Admins, Customers
- **Method**: Laravel Sanctum (token-based)
- **Role Management**: Admin, Manager, Editor roles
- **Password Policy**: Hashing, history tracking, reset capability

### Data Protection
- **Encryption**: Optional for sensitive settings
- **Audit Trail**: Complete activity logging
- **Soft Deletes**: Data recovery capability
- **Foreign Key Constraints**: Referential integrity

### Payment Security
- **PCI Compliance**: Via Razorpay (no card data stored locally)
- **Signature Verification**: Webhook validation
- **Transaction Logging**: Complete payment history
- **Failure Tracking**: Detailed error logging

---

## 📈 Scalability Strategy

### Read Scaling
- **Database Replication**: Read replicas
- **Caching Layer**: Redis for frequently accessed data
- **Query Optimization**: Composite indices, full-text search
- **CDN**: For static assets

### Write Scaling
- **Connection Pooling**: Efficient database connections
- **Queue Processing**: Asynchronous operations
- **Batch Operations**: Bulk processing
- **Future Sharding**: By customer_id or geography

### Performance Optimization
- **Indices**: 15+ strategic indices
- **Composite Keys**: Multi-column indices
- **Full-Text Search**: Product search
- **Pagination**: Prevent large result sets
- **Denormalization**: JSON fields for flexibility

---

## 📋 API Endpoints Summary

### Customer API (`/api/v1/customer`)
```
Authentication:
  POST   /auth/register          - Register new customer
  POST   /auth/login             - Customer login
  POST   /auth/logout            - Logout

Products & Browse:
  GET    /products               - List products
  GET    /products/{id}          - Product details
  GET    /categories             - Browse categories
  GET    /search                 - Search products

Shopping:
  POST   /cart/add               - Add to cart
  PUT    /cart/update/{item_id}  - Update cart item
  DELETE /cart/remove/{item_id}  - Remove from cart
  GET    /cart                   - View cart

Orders:
  POST   /checkout               - Place order
  GET    /orders                 - Order history
  GET    /orders/{order_id}      - Order details
  GET    /orders/{order_id}/track - Tracking info

Account:
  GET    /account                - Profile details
  PUT    /account                - Update profile
  POST   /addresses              - Add address
  GET    /loyalty                - Loyalty points
```

### Admin API (`/api/v1/admin`)
```
Products:
  GET    /products                - List all products
  POST   /products                - Create product
  PUT    /products/{id}           - Update product
  DELETE /products/{id}           - Delete product

Orders:
  GET    /orders                  - All orders
  PUT    /orders/{id}/status      - Update order status
  POST   /orders/{id}/refund      - Process refund

Inventory:
  GET    /inventory               - Stock levels
  POST   /inventory/transfer      - Transfer stock
  GET    /warehouses              - Warehouse list

Reports:
  GET    /reports/sales           - Sales analytics
  GET    /reports/products        - Product performance
  GET    /reports/customers       - Customer analytics
```

---

## 🔧 Configuration & Setup

### Environment Variables Required
```
APP_NAME=DrKinjal
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=drkinjal
DB_USERNAME=root
DB_PASSWORD=****

RAZORPAY_KEY_ID=rzp_****
RAZORPAY_KEY_SECRET=****

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_USERNAME=****
MAIL_PASSWORD=****
```

### Installation Steps
```bash
# 1. Clone repository
git clone <repo-url>
cd DrKinjal

# 2. Install dependencies
composer install
npm install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Database
php artisan migrate --seed

# 5. Build assets
npm run build

# 6. Serve application
php artisan serve
```

---

## 📊 Tables by Purpose

### Catalog Tables (16)
`products`, `product_variants`, `variant_attributes`, `variant_images`, `categories`, `category_hierarchies`, `category_product`, `category_attributes`, `category_spec_groups`, `brands`, `tags`, `attributes`, `attribute_values`, `specifications`, `specification_groups`, `specification_values`

### Order Tables (14)
`orders`, `order_items`, `order_status_history`, `cart`, `cart_items`, `order_sequences`, `payments`, `payment_attempts`, `product_reviews`, `review_images`, `review_votes`, `shipments`, `shipment_items`, `returns`, `return_items`

### Inventory Tables (7)
`product_variants` (stock fields), `warehouses`, `warehouse_stocks`, `stock_history`, `inventory_transfers`, `inventory_transfer_items`, `price_histories`, `tier_prices`

### Customer Tables (5)
`customers`, `customer_addresses`, `customer_segments`, `customer_segment_members`, `password_histories`

### System Tables (5)
`settings`, `currencies`, `tax_classes`, `tax_rates`, `notification_templates`, `notifications`, `email_logs`, `sms_logs`, `media`

---

## ✅ Validation Rules

### Product Creation
- Name: Required, max 200 chars
- SKU: Required, unique per warehouse
- Price: Required, positive decimal
- Stock: Integer, non-negative
- Status: Must be draft|active|inactive

### Order Processing
- Cart items: Must exist and be available
- Quantity: Must be ≤ available stock
- Shipping address: Required fields (name, phone, address, city, state, zip)
- Payment method: Must be active

### Customer Account
- Email: Valid format, unique
- Mobile: Valid format, unique (if provided)
- Password: Min 8 chars, one uppercase, one number

---

## 📞 Support & Maintenance

### Known Limitations
- Single payment gateway (Razorpay)
- MySQL-only database
- Single currency at checkout (multi-currency for display)
- No multi-language support (current version)

### Future Enhancements
- Multi-currency checkout
- Multiple payment gateways
- Advanced analytics & BI integration
- AI-powered recommendations
- Mobile app integration

---

## 📚 Related Documentation

- **API Documentation**: See `routes/api.php` and controller files
- **Database Schema**: See migration file `2025_12_21_033034_create_ecommerecedb_table.php`
- **Service Layer**: See `app/Services/` directory
- **Model Relationships**: See `app/Models/` directory

---

## 🎓 Learning Path

### For New Developers
1. Start with **DOCUMENTATION.md** - System overview
2. Review **Architecture & Methodology** section
3. Study **Module Breakdown**
4. Examine **DFD_DIAGRAMS.md** for flow understanding
5. Reference **ER_DIAGRAMS.md** for database design

### For Database Administrators
1. Read **Database Design** section in DOCUMENTATION.md
2. Review all **ER_DIAGRAMS.md** for relationships
3. Understand indexing strategy in ER_DIAGRAMS.md
4. Monitor query patterns section

### For API Developers
1. Review **API Architecture** in DOCUMENTATION.md
2. Study Main **DFD_DIAGRAMS.md** for payment/order flows
3. Reference tables needed for each module
4. Examine controller files in `app/Http/Controllers/`

---

## 📈 Metrics & Performance

### Typical Queries
- Product listing: < 100ms
- Cart calculations: < 50ms
- Order placement: < 500ms (with payment)
- Payment processing: 2-5 seconds (external gateway)

### Database Size (Estimated)
- Small store (1K products, 10K orders): ~500MB
- Medium store (50K products, 100K orders): ~5GB
- Large store (500K products, 1M orders): ~50GB

### Recommended Server Specs
- **CPU**: 4+ cores
- **RAM**: 8GB minimum
- **Storage**: 50GB+ (depends on products/media)
- **Bandwidth**: Minimum 10Mbps

---

## 🔗 External Integrations

1. **Razorpay** - Payment processing
2. **SMTP** - Email delivery
3. **SMS Gateway** - SMS notifications (optional)
4. **Courier APIs** - Shipment tracking (optional)
5. **AWS S3** - Media storage (optional)

---

## ✨ Quick Stats

- **Total Database Tables**: ~79
- **Total Models**: 70+
- **Total Controllers**: 20+
- **Total Services**: 15+
- **API Endpoints**: 50+
- **Lines of Migration**: 1,900+
- **Supported Product Types**: 5 (simple, configurable, bundle, virtual, downloadable)
- **Supported Offer Types**: 6 (percentage, fixed, BOGO, tiered, free shipping, custom)

---

## 🚀 Getting Started

1. **Prerequisites**:
   - PHP 8.2+
   - MySQL 8.0+
   - Composer
   - Node.js 18+

2. **Quick Setup**:
   ```bash
   composer setup    # Runs all setup commands
   npm run dev       # Start development server
   ```

3. **Access Points**:
   - Frontend: http://localhost:8000
   - Admin: http://localhost:8000/admin
   - API: http://localhost:8000/api/v1

---

## 📝 Document Versions

| Document | Version | Last Updated | Status |
|----------|---------|--------------|--------|
| DOCUMENTATION.md | 2.0 | 2026-02-16 | ✅ Complete |
| DFD_DIAGRAMS.md | 1.0 | 2026-02-16 | ✅ Complete |
| ER_DIAGRAMS.md | 2.0 | 2026-02-16 | ✅ Complete |
| QUICK_REFERENCE.md | 1.0 | 2026-02-16 | ✅ Active |

---

**Last Updated**: February 16, 2026  
**Maintained By**: DrKinjal Development Team  
**For Support**: Refer to individual documentation files
