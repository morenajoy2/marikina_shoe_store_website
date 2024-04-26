<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
</head>
<body style="background-color: #0D1B2A">
<header style="display: block;">
    <div class="nav-bar-main">
        <div class="nav-bar-inner">
            <div class="nav-bar-content">
                <div class="nav-bar-logo">
                    <h1>LOGO</h1>
                </div>
                <ul class="nav-bar-list">
                    <li class="nav-bar-dropdown"><a href="#">HOME</a></li>
                    <li class="nav-bar-dropdown"><a href="#">PRODUCT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">ABOUT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">CONTACT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">ORDERS</a></li>
                </ul>
                <div class="nav-bar-register-button">
                    <button type="button"><a href="#">REGISTER</a></button>

                </div>
            </div>
        </div>
    </div>
</header>
            <div class="div-a">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
<div class="divspace">
    <div class="div-12">
        <div class="div-13">
            <div class="column">
                 <div class="div-14">
                    <div class="div-15">Orders</div>
                    <div class="div-16">
                        <img
              loading="lazy"
              srcset=""
            />
          </div>
          <div class="div-17">The cart is empty.</div>
        </div>
      </div>
      <div class="column-2">
        <div class="div-18">
          <div class="div-19">
            <div class="div-20">
              <div class="div-21">Summary</div>
              <div class="div-22">Subtotal (0 Items)</div>
            </div>
            <div class="div-23">AED 0.00</div>
          </div>
          <div class="div-24">(Inclusive of VAT)</div>
          <div class="div-25">
            <div class="div-26">Total</div>    
            <div class="div-27">AED 0.00</div>
          </div>
          <div class="div-28">Do You Have A Promo Code?</div>
          <div class="div-29">Enter Promo Code</div>
        </div>
      </div>
    </div>
</div>
</div>
</body>
</html>



<style>
.divspace {
    margin-left: 490px;
    margin-top: 200px;
    font: 700 2em Inter, sans-serif;
}

  .div-12 {
    align-self: center;
    margin-top: 67px;
    width: 100%;
    max-width: 980px;
  }
  @media (max-width: 991px) {
    .div-12 {
      max-width: 100%;
      margin-top: 40px;
    }
  }
  .div-13 {
    gap: 20px;
    display: flex;
  }
  @media (max-width: 991px) {
    .div-13 {
      flex-direction: column;
      align-items: stretch;
      gap: 0px;
    }
  }
  .column {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 67%;
    margin-left: 0px;
  }
  @media (max-width: 991px) {
    .column {
      width: 100%;
    }
  }
  .div-14 {
    display: flex;
    flex-direction: column;
    padding: 0 20px;
  }
  @media (max-width: 991px) {
    .div-14 {
      max-width: 100%;
      margin-top: 40px;
    }
  }
  .div-15 {
    color: #fff;
    leading-trim: both;
    text-edge: cap;
    text-transform: uppercase;
    font: 700 18px Inter, sans-serif;
    display: flex; /* Add this line to center the text in the div */

  }
  @media (max-width: 991px) {
    .div-15 {
      max-width: 100%;
    }
  }
  .div-16 {
    border-radius: 6px;
    border-color: rgba(255, 255, 255, 1);
    border-style: solid;
    border-width: 1px;
    display: flex;
    margin-top: 27px;
    flex-direction: column;
    align-items: end;
    padding: 19px 60px 46px;
  }
  @media (max-width: 991px) {
    .div-16 {
      max-width: 100%;
      padding-left: 20px;
    }
  }
  .img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 20px;
  }
  .div-17 {
    color: #fff;
    leading-trim: both;
    text-edge: cap;
    margin-top: 35px;
    font: 400 18px Inter, sans-serif;
  }
  @media (max-width: 991px) {
    .div-17 {
      max-width: 100%;
    }
  }
  .column-2 {
    display: flex;
    flex-direction: column;
    line-height: normal;
    width: 33%;
    margin-left: 20px;
  }
  @media (max-width: 991px) {
    .column-2 {
      width: 100%;
    }
  }
  .div-18 {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    font-size: 18px;
    color: #fff;
    padding: 0 20px;
  }
  @media (max-width: 991px) {
    .div-18 {
      margin-top: 40px;
    }
  }
  .div-19 {
    display: flex;
    gap: 20px;
    justify-content: space-between;
  }
  .div-20 {
    display: flex;
    flex-direction: column;
  }
  .div-21 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    font-weight: 700;
  }
  .div-22 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    font-weight: 400;
    margin-top: 18px;
  }
  .div-23 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    font-weight: 400;
    align-self: end;
    margin-top: 37px;
  }
  .div-24 {
    leading-trim: both;
    text-edge: cap;
    align-self: end;
    margin-top: 6px;
    font: 400 12px Inter, sans-serif;
  }
  .div-25 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    margin-top: 22px;
    padding-top: 20px;
    padding-bottom: 22px;
    border-top: 1px solid #FFFFFF;
    border-bottom: 1px solid #FFFFFF;
}
  
  .img-2 {
    position: absolute;
    inset: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: center;
  }
  .div-26 {
    position: relative;
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
  }
  .div-27 {
    position: relative;
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
  }
  .div-28 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    font-weight: 700;
    margin-top: 27px;
  }
  .div-29 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 6px;
    border-color: rgba(255, 255, 255, 1);
    border-style: solid;
    border-width: 1px;
    margin-top: 15px;
    align-items: start;
    color: rgba(255, 255, 255, 0.5);
    font-weight: 700;
    justify-content: center;
    padding: 18px 15px;
  }
  @media (max-width: 991px) {
    .div-29 {
      padding-right: 20px;
    }
  }
  .div-30 {
    background-color: #fff;
    display: flex;
    margin-top: 355px;
    width: 100%;
    flex-direction: column;
    color: #0d1b2a;
    padding: 22px 57px;
  }
  @media (max-width: 991px) {
    .div-30 {
      max-width: 100%;
      margin-top: 40px;
      padding: 0 20px;
    }
  }
  .div-31 {
    display: flex;
    margin-top: 20px;
    width: 100%;
    gap: 20px;
    font-size: 18px;
    font-weight: 400;
    justify-content: space-between;
  }
  @media (max-width: 991px) {
    .div-31 {
      max-width: 100%;
      flex-wrap: wrap;
    }
  }


  .div-a {
    leading-trim: both;
    text-edge: cap;
    background-color: rgba(255, 255, 255, 0.5);
    margin-top: 5px;
    width: 94%;
    align-items: center;
    color: #fff;
    justify-content: center;
    padding: 17px 60px;
    font: 400 18px Inter, sans-serif;
  }
  @media (max-width: 991px) {
    .div-a {
      max-width: 100%;
      margin-top: 40px;
      padding: 0 20px;
    }
</style>