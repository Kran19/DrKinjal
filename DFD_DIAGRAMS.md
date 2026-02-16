# DrKinjal - Data Flow Diagram (DFD) - Visual Guide

## Complete System DFD

```mermaid
graph TD
    A["👤 Customer"] -->|Browse & Search| B["DrKinjal E-Commerce<br/>Platform"]
    B -->|Product Data| C[("📦 Product<br/>Database")]
    
    A -->|Add to Cart| D["🛒 Shopping Cart<br/>Service"]
    D -->|Store Cart| E[("💾 Cart<br/>Database")]
    
    A -->|Place Order| F["📋 Order<br/>Processing"]
    F -->|Reserve Stock| G[("📊 Inventory<br/>System")]
    
    F -->|Create Payment<br/>Request| H["💳 Payment<br/>Gateway<br/>Razorpay"]
    H -->|Payment<br/>Confirmation| F
    
    F -->|Update Status| I[("📑 Orders<br/>Database")]
    
    F -->|Send Email| J["📧 Email<br/>Service<br/>Notifications"]
    F -->|Send SMS| K["📱 SMS<br/>Service"]
    
    F -->|Notify Warehouse| L["🏭 Warehouse<br/>Management"]
    L -->|Shipment Data| M[("🚚 Shipment<br/>Database")]
    
    M -->|Tracking Updates| N["📍 Tracking<br/>Service"]
    N -->|Delivery Status| A
    
    L -->|Inventory<br/>Updates| G
    
    A -->|Submit Review| O["⭐ Review<br/>System"]
    O -->|Store Review| I
    
    A -->|Access Account| P["👤 Customer<br/>Profile<br/>Service"]
    P -->|User Data| Q[("📋 Customer<br/>Database")]
    
    R["🔧 Admin Panel"] -->|Manage Products| C
    R -->|Manage Orders| I
    R -->|Manage Inventory| G
    R -->|View Reports| S["📊 Analytics<br/>Engine"]
    
    S -->|Aggregated Data| T[("📈 Analytics<br/>Database")]
    
    style A fill:#e1f5ff
    style B fill:#fff3e0
    style C fill:#f3e5f5
    style D fill:#e8f5e9
    style E fill:#f3e5f5
    style F fill:#fce4ec
    style G fill:#f3e5f5
    style H fill:#fff9c4
    style I fill:#f3e5f5
    style J fill:#e0f2f1
    style K fill:#e0f2f1
    style L fill:#f1f8e9
    style M fill:#f3e5f5
    style N fill:#e0f2f1
    style O fill:#fccccc
    style P fill:#e8f5e9
    style Q fill:#f3e5f5
    style R fill:#fff9c4
    style S fill:#e1bee7
    style T fill:#f3e5f5
```

---

## Detailed Process Flow: Customer Journey

```mermaid
sequenceDiagram
    participant Customer
    participant Frontend
    participant API
    participant CartService
    participant OrderService
    participant PaymentGateway
    participant OrderDB
    participant Email
    participant Warehouse

    Customer->>Frontend: Browse Products
    Frontend->>API: GET /products?category=shoes
    API-->>Frontend: Product Catalog
    Frontend-->>Customer: Display Products

    Customer->>Frontend: Add to Cart
    Frontend->>API: POST /cart/add (product_id, qty)
    API->>CartService: Add Item
    CartService->>OrderDB: Store Cart Item
    API-->>Frontend: Cart Updated
    Frontend-->>Customer: Item Added ✓

    Customer->>Frontend: View Cart
    Frontend->>API: GET /cart
    API->>CartService: Get Cart
    CartService-->>API: Cart Data (with totals)
    API-->>Frontend: Cart Display
    Frontend-->>Customer: Cart Details

    Customer->>Frontend: Proceed to Checkout
    Frontend->>API: POST /checkout
    API->>OrderService: Create Order
    OrderService->>OrderDB: Create Order Record
    API-->>Frontend: Order Created
    Frontend-->>Customer: Payment Page

    Customer->>Frontend: Enter Payment Details
    Frontend->>PaymentGateway: Submit Payment
    PaymentGateway-->>Frontend: Razorpay Form
    Customer->>PaymentGateway: Complete Payment
    PaymentGateway->>API: Payment Webhook
    API->>OrderService: Payment Confirmed
    OrderService->>OrderDB: Update Order Status
    OrderService->>Email: Send Confirmation
    Email-->>Customer: Confirmation Email
    OrderService->>Warehouse: Notify Fulfillment
    Warehouse->>Customer: Package Prepared & Shipped
    Frontend-->>Customer: Order Confirmed ✓

    Customer->>Frontend: Track Order
    Frontend->>API: GET /orders/{order_id}/tracking
    API-->>Frontend: Tracking Info
    Frontend-->>Customer: Tracking Details
```

---

## Data Flow: Order Processing

```mermaid
graph LR
    A["1. Customer<br/>Initializes<br/>Checkout"] -->|Cart Data| B["2. Validate<br/>Cart Items"]
    B -->|Valid| C["3. Calculate<br/>Totals"]
    B -->|Invalid| X["❌ Cancel<br/>Transaction"]
    
    C -->|Subtotal<br/>Tax<br/>Shipping| D["4. Create<br/>Order<br/>Record"]
    
    D -->|Order ID| E["5. Initiate<br/>Payment"]
    E -->|Payment<br/>Request| F["6. Razorpay<br/>Gateway"]
    
    F -->|Success| G["7. Update<br/>Order Status"]
    F -->|Failed| H["8. Retry<br/>Payment"]
    H -->|Attempt 3| X
    
    G -->|Reserve<br/>Inventory| I["9. Stock<br/>Deduction"]
    
    I -->|Generate<br/>Receipt| J["10. Send<br/>Notifications"]
    
    J -->|Email| K["Confirmation<br/>Email"]
    J -->|SMS| L["SMS<br/>Alert"]
    J -->|Warehouse| M["Order<br/>Summary"]
    
    M -->|Fulfillment| N["11. Order<br/>Complete"]
    
    style A fill:#e1f5ff
    style B fill:#fff3e0
    style C fill:#fff3e0
    style D fill:#f3e5f5
    style E fill:#fce4ec
    style F fill:#fff9c4
    style G fill:#e8f5e9
    style H fill:#ffebee
    style I fill:#f3e5f5
    style J fill:#e0f2f1
    style K fill:#e0f2f1
    style L fill:#e0f2f1
    style M fill:#f1f8e9
    style N fill:#c8e6c9
    style X fill:#ffcdd2
```

---

## Data Flow: Inventory Management

```mermaid
graph TD
    A["Stock Received<br/>from Supplier"] -->|Warehouse<br/>Intake| B["Update Warehouse<br/>Stock Levels"]
    B -->|warehouse_stocks<br/>table| C[("Warehouse<br/>Inventory")]
    
    D["Customer<br/>Places Order"] -->|Item<br/>Reserved| E["Create Stock<br/>Reservation"]
    E -->|reserved_qty++| C
    
    F["Payment<br/>Confirmed"] -->|Deduct<br/>Stock| G["Reduce Available<br/>Stock"]
    G -->|stock_qty--| C
    
    C -->|Check<br/>Levels| H{Stock Level<br/>Below<br/>Threshold?}
    H -->|Yes| I["Trigger<br/>Low Stock Alert"]
    I -->|Email| J["Admin<br/>Notification"]
    
    K["Customer<br/>Returns<br/>Items"] -->|Receive<br/>Return| L["Inspect<br/>Item"]
    L -->|Condition<br/>OK| M["Restore<br/>Inventory"]
    M -->|stock_qty++| C
    L -->|Damaged| N["Scrap/Donate"]
    
    O["Transfer<br/>Between<br/>Warehouses"] -->|Reduce<br/>Source| P["Source<br/>Warehouse<br/>Decrease"]
    P -->|Increase<br/>Dest| Q["Destination<br/>Warehouse<br/>Increase"]
    
    Q -->|Log<br/>Entry| R["Stock History<br/>Audit Trail"]
    M -->|Log Entry| R
    G -->|Log Entry| R
    
    style A fill:#e8f5e9
    style B fill:#f3e5f5
    style C fill:#f3e5f5
    style D fill:#e1f5ff
    style E fill:#fce4ec
    style F fill:#fff9c4
    style G fill:#fff3e0
    style H fill:#fff3e0
    style I fill:#ffebee
    style J fill:#ffebee
    style K fill:#e8f5e9
    style L fill:#fff3e0
    style M fill:#c8e6c9
    style N fill:#ffcdd2
    style O fill:#e0f2f1
    style P fill:#fff3e0
    style Q fill:#fff3e0
    style R fill:#f3e5f5
```

---

## Data Flow: Payment Processing

```mermaid
graph LR
    A["Order Ready<br/>for Payment"] -->|Order Total| B["Prepare<br/>Payment<br/>Request"]
    
    B -->|Amount<br/>Currency<br/>Customer ID| C["Submit to<br/>Razorpay"]
    
    C -->|Generate<br/>Payment Link| D["Customer<br/>Enters Details"]
    
    D -->|Payment<br/>Credentials| E["Razorpay<br/>Processes"]
    
    E -->|Bank/Card<br/>Network| F["Payment<br/>Processor"]
    
    F -->|Success| G["Razorpay<br/>Confirms"]
    F -->|Failed| H["Razorpay<br/>Denies"]
    
    G -->|Webhook<br/>Callback| I["System Receives<br/>Confirmation"]
    H -->|Webhook<br/>Callback| J["System Receives<br/>Failure"]
    
    I -->|Verify<br/>Signature| K{Valid<br/>Signature?}
    J -->|Log<br/>Failure| L["Update Order<br/>Payment Status:<br/>FAILED"]
    
    K -->|Yes| M["Update Order<br/>Payment Status:<br/>PAID"]
    K -->|No| N["Security Alert"]
    
    M -->|Trigger<br/>Success| O["Deduct Inventory"]
    M -->|Send| P["Send Confirmation<br/>Email"]
    M -->|Add| Q["Calculate Loyalty<br/>Points"]
    
    L -->|Offer<br/>Retry| R["Retry Payment<br/>Option"]
    
    O -->|Order| S["Mark Order<br/>Ready for<br/>Fulfillment"]
    
    style A fill:#e1f5ff
    style B fill:#f3e5f5
    style C fill:#fce4ec
    style D fill:#e1f5ff
    style E fill:#fff9c4
    style F fill:#fff3e0
    style G fill:#c8e6c9
    style H fill:#ffcdd2
    style I fill:#f3e5f5
    style J fill:#f3e5f5
    style K fill:#fff3e0
    style L fill:#ffebee
    style M fill:#c8e6c9
    style N fill:#ffebee
    style O fill:#f3e5f5
    style P fill:#e0f2f1
    style Q fill:#e8f5e9
    style R fill:#fff3e0
    style S fill:#f3e5f5
```

---

## Data Flow: Promotional Engine

```mermaid
graph TD
    A["Offer/Coupon<br/>Created"] -->|offer_id| B["Store Offer<br/>Details"]
    B -->|offers<br/>table| C[("Offers<br/>Database")]
    
    D["Customer<br/>Views Cart"] -->|Cart Total| E["Check Applicable<br/>Offers"]
    
    E -->|Query| C
    C -->|Matching<br/>Offers| F["Filter Eligible<br/>Offers"]
    
    F -->|Check<br/>Conditions| G{Offer<br/>Valid?<br/>- Segment<br/>- Budget<br/>- Timing}
    
    G -->|Yes| H["Calculate<br/>Discount"]
    G -->|No| I["Skip Offer"]
    
    H -->|Apply<br/>Rule| J["Determine<br/>Discount<br/>Amount"]
    
    J -->|Percentage?| K["Discount =<br/>Amount × %"]
    J -->|Fixed?| L["Discount =<br/>Amount"]
    J -->|BOGO?| M["Add Free<br/>Item to Cart"]
    
    K -->|Max<br/>Discount<br/>Check| N["Cap Discount<br/>if Needed"]
    L -->|Max<br/>Discount<br/>Check| N
    
    N -->|Update<br/>Cart| O["Reduce<br/>Grand Total"]
    M -->|Update<br/>Cart| O
    
    O -->|Display| P["Show Savings<br/>to Customer"]
    
    Q["Customer<br/>Purchases"] -->|Apply<br/>Discount| R["Create Order<br/>with Discount"]
    
    R -->|Log Usage| S["Record in<br/>offer_usages"]
    
    S -->|Update<br/>Counter| T["Increment<br/>used_count"]
    
    T -->|Check<br/>Limit| U{Max Uses<br/>Reached?}
    
    U -->|Yes| V["Mark Offer<br/>as Expired"]
    U -->|No| W["Offer Still<br/>Active"]
    
    style A fill:#fce4ec
    style B fill:#f3e5f5
    style C fill:#f3e5f5
    style D fill:#e1f5ff
    style E fill:#fff3e0
    style F fill:#fff3e0
    style G fill:#fff3e0
    style H fill:#c8e6c9
    style I fill:#ffcdd2
    style J fill:#fff3e0
    style K fill:#fff3e0
    style L fill:#fff3e0
    style M fill:#c8e6c9
    style N fill:#fff3e0
    style O fill:#c8e6c9
    style P fill:#e8f5e9
    style Q fill:#fce4ec
    style R fill:#f3e5f5
    style S fill:#f3e5f5
    style T fill:#fff3e0
    style U fill:#fff3e0
    style V fill:#ffebee
    style W fill:#c8e6c9
```

---

## Data Flow: Notification System

```mermaid
graph LR
    A["Trigger Event<br/>- Order Placed<br/>- Payment Received<br/>- Order Shipped"] -->|Event| B["Notification<br/>Service"]
    
    B -->|Query| C[("Notification<br/>Templates")]
    
    C -->|Template<br/>Data| D["Build Message"]
    D -->|Substitute<br/>Variables| E["Personalize<br/>Content"]
    
    E -->|Email| F["Queue Email<br/>Job"]
    E -->|SMS| G["Queue SMS<br/>Job"]
    E -->|Push| H["Queue Push<br/>Job"]
    E -->|In-App| I["Store In-App<br/>Notification"]
    
    F -->|Email<br/>Configuration| J["SMTP<br/>Server"]
    J -->|Send| K["Customer<br/>Inbox"]
    
    G -->|SMS<br/>Provider| L["SMS<br/>Gateway"]
    L -->|Send| M["Customer<br/>Phone"]
    
    H -->|Push<br/>Provider| N["Firebase<br/>Cloud<br/>Messaging"]
    N -->|Send| O["Customer<br/>Device"]
    
    I -->|Store| P[("In-App<br/>Notifications<br/>Database")]
    P -->|Display| Q["Customer<br/>Dashboard"]
    
    K -->|Log| R["Email<br/>Logs"]
    M -->|Log| S["SMS<br/>Logs"]
    Q -->|Log| T["User<br/>Activity"]
    
    R -->|Status<br/>Tracking| U["Analytics<br/>Dashboard"]
    S -->|Status<br/>Tracking| U
    T -->|Status<br/>Tracking| U
    
    style A fill:#fce4ec
    style B fill:#f3e5f5
    style C fill:#f3e5f5
    style D fill:#fff3e0
    style E fill:#fff3e0
    style F fill:#f3e5f5
    style G fill:#f3e5f5
    style H fill:#f3e5f5
    style I fill:#f3e5f5
    style J fill:#e0f2f1
    style K fill:#e1f5ff
    style L fill:#e0f2f1
    style M fill:#e1f5ff
    style N fill:#e0f2f1
    style O fill:#e1f5ff
    style P fill:#f3e5f5
    style Q fill:#e1f5ff
    style R fill:#f3e5f5
    style S fill:#f3e5f5
    style T fill:#f3e5f5
    style U fill:#f1f8e9
```

---

## Data Flow: Loyalty Points System

```mermaid
graph TD
    A["Customer<br/>Signup"] -->|signup_bonus| B["Award Signup<br/>Points"]
    
    C["Customer Makes<br/>Purchase"] -->|Calculate| D["Earn Points<br/>= Amount ×<br/>rate"]
    
    D -->|Add to<br/>Account| E[("Customer Loyalty<br/>Record")]
    
    F["Link to<br/>Segment"] -->|qualifying<br/>purchase| D
    
    E -->|total_points++| G["Update Total<br/>Points"]
    E -->|available_points++| H["Update Available<br/>Points"]
    
    G -->|Log| I["Loyalty<br/>Transactions"]
    H -->|Log| I
    
    J["Customer<br/>Redeems<br/>Points"] -->|Check<br/>Balance| K{Available<br/>Points ≥<br/>Redemption?}
    
    K -->|No| L["Insufficient<br/>Points<br/>Error"]
    K -->|Yes| M["Deduct<br/>Points"]
    
    M -->|used_points++| E
    M -->|available_points--| E
    M -->|Create| N["Loyalty<br/>Transaction<br/>Record"]
    
    N -->|Calculate<br/>Value| O["Discount =<br/>Points ×<br/>point_value"]
    
    O -->|Apply to<br/>Cart| P["Reduce<br/>Order Total"]
    
    Q["Points<br/>Expiry<br/>Policy"] -->|Check Age| R{Points Older<br/>Than<br/>X Days?}
    
    R -->|Yes| S["Mark<br/>Expired"]
    S -->|expired_points++| E
    S -->|Log| I
    
    style A fill:#e1f5ff
    style B fill:#c8e6c9
    style C fill:#fce4ec
    style D fill:#fff3e0
    style E fill:#f3e5f5
    style F fill:#e8f5e9
    style G fill:#f3e5f5
    style H fill:#f3e5f5
    style I fill:#f3e5f5
    style J fill:#e8f5e9
    style K fill:#fff3e0
    style L fill:#ffebee
    style M fill:#c8e6c9
    style N fill:#f3e5f5
    style O fill:#fff3e0
    style P fill:#c8e6c9
    style Q fill:#fff3e0
    style R fill:#fff3e0
    style S fill:#ffebee
```

---

## Data Flow Integration Map

```mermaid
graph TB
    subgraph Customer_Interactions["Customer Interactions"]
        C1["Browse Products"]
        C2["Add to Cart"]
        C3["Checkout"]
        C4["Pay"]
        C5["Track Order"]
        C6["Review Product"]
    end
    
    subgraph Core_Systems["Core Systems"]
        S1["Product Catalog"]
        S2["Shopping Cart"]
        S3["Order Engine"]
        S4["Payment Engine"]
        S5["Inventory"]
        S6["Notification"]
    end
    
    subgraph Support_Systems["Support Systems"]
        X1["Loyalty Program"]
        X2["Promotions"]
        X3["Analytics"]
        X4["Audit Logs"]
    end
    
    C1 -->|Search| S1
    C2 -->|Add Item| S2
    C3 -->|Process| S3
    C4 -->|Initiate| S4
    C5 -->|Track| S3
    C6 -->|Submit| S1
    
    S3 -->|Deduct| S5
    S3 -->|Award| X1
    S3 -->|Check| X2
    S3 -->|Send| S6
    S4 -->|Confirm| S3
    
    S2 -->|Apply| X2
    X1 -->|Apply| S2
    S6 -->|Log| X4
    S3 -->|Generate| X3
    S5 -->|Alert| S6
    
    style C1 fill:#e1f5ff
    style C2 fill:#e1f5ff
    style C3 fill:#e1f5ff
    style C4 fill:#e1f5ff
    style C5 fill:#e1f5ff
    style C6 fill:#e1f5ff
    
    style S1 fill:#fff3e0
    style S2 fill:#fff3e0
    style S3 fill:#fff3e0
    style S4 fill:#fff3e0
    style S5 fill:#fff3e0
    style S6 fill:#fff3e0
    
    style X1 fill:#f1f8e9
    style X2 fill:#f1f8e9
    style X3 fill:#f1f8e9
    style X4 fill:#f1f8e9
```

---

## Context Diagram Summary

The DrKinjal e-commerce platform operates as a centralized system coordinating:

1. **Customer Interactions** (Input):
   - Browse products
   - Manage cart
   - Place orders
   - Make payments
   - Track shipments
   - Submit reviews

2. **External Systems** (Integration):
   - Razorpay (Payment Gateway)
   - SMTP Server (Email)
   - SMS Provider (Messaging)
   - Courier Services (Shipping)

3. **Data Processing** (Core):
   - Product catalog management
   - order processing
   - Payment processing
   - Inventory tracking
   - Customer communication

4. **Outputs** (Responses):
   - Order confirmations
   - Shipping updates
   - Customer notifications
   - Admin reports
   - Analytics data

