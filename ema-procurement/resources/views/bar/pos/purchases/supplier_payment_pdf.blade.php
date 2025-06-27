<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment Receipt</title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 20px;
      color: #1c2326;
    }

    .receipt-container {
      max-width: 720px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
      padding: 30px;
      position: relative;
      page-break-inside: avoid;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      border-bottom: 1px solid #aab4bd;
      padding-bottom: 20px;
    }

    .logo img {
      max-height: 60px;
      object-fit: contain;
    }

    .company-info {
      max-width: 320px;
      text-align: right;
      color: #414f54;
      font-size: 14px;
      line-height: 1.5;
    }

    .company-info strong {
      font-size: 18px;
      color: #1c2326;
      display: block;
      margin-bottom: 6px;
    }

    .section-title {
      font-size: 22px;
      font-weight: 600;
      color: #0c63e4;
      text-align: center;
      margin: 30px 0 15px;
      border-bottom: 2px solid #aab4bd;
      padding-bottom: 8px;
    }

    .payment-details {
      margin-top: 15px;
    }

    .detail-row {
      display: flex;
      margin-bottom: 12px;
      font-size: 14px;
      color: #2f3a44;
    }

    .detail-label {
      width: 180px;
      font-weight: 700;
      color: #1c2326;
    }

    .detail-value {
      flex: 1;
      color: #2f3a44;
    }

    .amount-highlight {
      font-size: 26px;
      font-weight: 700;
      color: #009970;
    }

    .status-badge {
      background-color: #009970;
      color: #fff;
      font-size: 12px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 12px;
      margin-left: 10px;
      vertical-align: middle;
    }

    .footer {
      text-align: center;
      font-size: 13px;
      color: #414f54;
      margin-top: 40px;
      border-top: 1px dashed #aab4bd;
      padding-top: 15px;
    }

    .watermark {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(-30deg);
      font-size: 110px;
      font-weight: 700;
      color: #4080f0;
      opacity: 0.07;
      z-index: 0;
      pointer-events: none;
    }

    @media print {
      body {
        background: none;
        padding: 10px;
        color: #1c2326 !important;
      }

      .receipt-container {
        box-shadow: none;
        border-radius: 0;
        padding: 15px;
        page-break-inside: avoid;
        page-break-after: avoid;
        page-break-before: avoid;
      }

      .watermark {
        opacity: 0.15;
      }
    }
  </style>
</head>

<body>
  <div class="receipt-container">
    <div class="watermark">PAID</div>

    <header>
      <div class="logo">
        <img src="{{ url('assets/img/diy_image.jpg') }}" alt="DIY Logo" />
      </div>
      <div class="company-info">
        <strong>DIY LIMITED</strong>
        <div>Changombe: Plot 38, Mbozi Road</div>
        <div>Tel: +255 22 2864114 / 2860505</div>
        <div>Mwenge: Plot 42, Opp Majembe Auction Mart</div>
        <div>Tel: +255 22 2773270 / 2774906</div>
        <div>Fax: +255 736602262</div>
        <div>PO Box: 19886, Dar es Salaam, Tanzania</div>
        <div>Email: info@diy.co.tz</div>
        <div>Web: www.diy.co.tz</div>
      </div>
    </header>

    <div class="section-title">Payment Receipt</div>

    <div class="payment-details">
      <div class="detail-row">
        <div class="detail-label">Reference No:</div>
        <div class="detail-value">
          {{ $payment->reference_no }}
          <span class="status-badge">Completed</span>
        </div>
      </div>

      <div class="detail-row">
        <div class="detail-label">Supplier:</div>
        <div class="detail-value">
          {{ $payment->invoice && $payment->invoice->supplier ? $payment->invoice->supplier->name : 'Unknown Supplier' }}
        </div>
      </div>

      <div class="detail-row">
        <div class="detail-label">Payment Date:</div>
        <div class="detail-value">{{ $payment->created_at->format('F j, Y') }}</div>
      </div>

      <div class="detail-row">
        <div class="detail-label">Payment Method:</div>
        <div class="detail-value">{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</div>
      </div>

      <div class="detail-row">
        <div class="detail-label">Account Type:</div>
        <div class="detail-value">{{ ucfirst(str_replace('_', ' ', $payment->account_type)) }}</div>
      </div>

      <div class="detail-row">
        <div class="detail-label">Amount Paid:</div>
        <div class="detail-value">
          <div class="amount-highlight">
            {{ number_format($payment->amount, 2) }} {{ $payment->invoice ? $payment->invoice->currency : 'TZS' }}
          </div>
        </div>
      </div>

      @if ($payment->description)
      <div class="detail-row">
        <div class="detail-label">Description:</div>
        <div class="detail-value">{{ $payment->description }}</div>
      </div>
      @endif
    </div>

    <div class="footer">
      <p>Thank you for your payment. This receipt confirms your transaction.</p>
      <p>For questions, contact us at <strong>info@diy.co.tz</strong> or call <strong>+255 22 2864114</strong>.</p>
    </div>
  </div>
</body>

</html>

