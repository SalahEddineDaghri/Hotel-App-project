<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>INVOICE | {{ $p->invoice }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: white;
            line-height: 1.4;
        }
        
        @media screen {
            body {
                background-color: #f5f7fa;
                padding: 20px;
            }
            .invoice-container {
                max-width: 800px;
                margin: 0 auto;
                background: white;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        }
        
        .invoice-header {
            padding: 20px 30px;
            border-bottom: 2px solid #4a6bdf;
        }
        
        .invoice-status {
            font-size: 0.9rem;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }
        
        .info-section {
            padding: 20px 30px;
        }
        
        .info-title {
            color: #4a6bdf;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1rem;
        }
        
        .info-item {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .info-label {
            font-weight: 600;
            min-width: 80px;
            display: inline-block;
        }
        
        .dates-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 30px;
            background-color: #f8f9fa;
            font-size: 0.9rem;
        }
        
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 0.85rem;
        }
        
        .invoice-table th {
            background-color: #4a6bdf;
            color: white;
            padding: 8px 10px;
            text-align: left;
        }
        
        .invoice-table td {
            padding: 8px 10px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .total-row {
            font-weight: 600;
        }
        
        .grand-total {
            font-weight: 700;
            color: #4a6bdf;
            font-size: 1rem;
        }
        
        .notes-section {
            padding: 15px 30px;
            font-size: 0.8rem;
            border-top: 1px dashed #dee2e6;
            margin-top: 20px;
        }
        
        .signature-area {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .invoice-container, .invoice-container * {
                visibility: visible;
            }
            .invoice-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }
            .no-print {
                display: none !important;
            }
        }
        
        @media (max-width: 768px) {
            .info-item {
                display: flex;
                flex-direction: column;
            }
            .info-label {
                margin-bottom: 2px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Print Button (hidden when printing) -->
        <div class="no-print text-end p-3">
            <button onclick="window.print()" class="btn btn-sm btn-primary" {{ $p->status == 'Pending' ? 'disabled' : '' }}>
                <i class="fas fa-print me-1"></i> Print Invoice
            </button>
        </div>
        
        <!-- Invoice Header -->
        <div class="invoice-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0" style="font-size: 1.5rem;">INVOICE</h2>
                <span class="invoice-status {{ $p->status == 'Pending' ? 'status-pending' : 'status-paid' }}">
                    {{ $p->status }}
                </span>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <p class="mb-0" style="font-size: 0.9rem;">#{{ $p->invoice }}</p>
                <p class="mb-0" style="font-size: 0.9rem;">{{ Carbon\Carbon::now()->isoFormat('MMMM D, YYYY') }}</p>
            </div>
        </div>
        
        <!-- Company and Client Info -->
        
        <div class="row m-0">
            <div class="col-md-6 p-0">
                <div class="info-section">
                    <h3 class="info-title">From</h3>
                    <div class="info-item">
                        <span class="info-label">Company:</span>
                        <span>Bela Hotel</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Address:</span>
                        <span>123 Hospitality Street, Fes Medina,  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Morocco</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone:</span>
                        <span>+212 6 12 34 56 78</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span>belahotel@gmail.com</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 p-0">
                <div class="info-section">
                    <h3 class="info-title">Bill To</h3>
                    <div class="info-item">
                        <span class="info-label">Name:</span>
                        <span>{{ $p->transaction->customer->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Room:</span>
                        <span>{{ $p->transaction->room->type->name }} #{{ $p->transaction->room->no }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Address:</span>
                        <span>{{ $p->transaction->customer->address }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span>{{ $p->transaction->customer->user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dates Info -->
        <div class="dates-row">
            <div class="info-item">
                <span class="info-label">Check-in:</span>
                <span>{{ Carbon\Carbon::parse($p->transaction->check_in)->isoFormat('MMM D, YYYY') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Check-out:</span>
                <span>{{ Carbon\Carbon::parse($p->transaction->check_out)->isoFormat('MMM D, YYYY') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Duration:</span>
                <span>{{ $p->transaction->check_in->diffInDays($p->transaction->check_out) }} Days</span>
            </div>
        </div>
        
        <!-- Invoice Table -->
        <div class="info-section p-0">
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th style="width: 25%">Room</th>
                        <th style="width: 15%" class="text-center">Check-in</th>
                        <th style="width: 15%" class="text-center">Check-out</th>
                        <th style="width: 10%" class="text-center">Days</th>
                        <th style="width: 15%" class="text-right">Price</th>
                        <th style="width: 20%" class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $p->transaction->room->type->name }} #{{ $p->transaction->room->no }}</td>
                        <td class="text-center">{{ Carbon\Carbon::parse($p->transaction->check_in)->isoFormat('MMM D') }}</td>
                        <td class="text-center">{{ Carbon\Carbon::parse($p->transaction->check_out)->isoFormat('MMM D') }}</td>
                        <td class="text-center">{{ $p->transaction->check_in->diffInDays($p->transaction->check_out) }}</td>
                        <td class="text-right">DH {{ number_format($p->transaction->room->price) }}</td>
                        <td class="text-right">DH {{ number_format($p->transaction->room->price * $p->transaction->check_in->diffInDays($p->transaction->check_out)) }}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="4"></td>
                        <td class="text-right">Subtotal</td>
                        <td class="text-right">DH {{ number_format($p->transaction->room->price * $p->transaction->check_in->diffInDays($p->transaction->check_out)) }}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="4"></td>
                        <td class="text-right">Tax (0%)</td>
                        <td class="text-right">DH 0</td>
                    </tr>
                    <tr class="grand-total">
                        <td colspan="4"></td>
                        <td class="text-right">Grand Total</td>
                        <td class="text-right">DH {{ number_format($p->price) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Notes and Signature -->
        <div class="notes-section">          
            
            <div class="signature-area">
                <div>
                    <div style="height: 40px; border-bottom: 1px solid #333; width: 200px;"></div>
                    <div class="mt-1">Customer Signature</div>
                </div>
                <div>
                    <div style="height: 40px; border-bottom: 1px solid #333; width: 200px;"></div>
                    <div class="mt-1">Authorized Signature</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Automatically trigger print dialog when page loads (optional)
        // window.addEventListener('load', function() {
        //     if (window.location.search.includes('print=true')) {
        //         window.print();
        //     }
        // });
    </script>
</body>
</html>