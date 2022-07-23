<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    />
    <link rel="shortcut icon" href="/Images/logo.png" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://kit.fontawesome.com/09789629f4.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Checkout</title>
  </head>
  <body>
    <div
      class="fluid-container w-100 d-flex align-items-center justify-content-center"
      style="height: 15vh; background-color: #ff9f1a"
    >
      <h2 class="text-white text-center">
        <i class="fa fa-money" aria-hidden="true"></i> &nbsp; Checkoout
      </h2>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-lg-6 px-lg-5">
          <div class="h4 my-3">1. Billing Information</div>
          <form class="g-3 needs-validation" validate>
            <label for="nameInput" class="form-label mt-3">Full name</label>
            <input type="text" class="form-control" id="nameInput" required />
            <div class="valid-feedback">Looks good!</div>

            <label for="emailInput" class="form-label mt-3">Email</label>
            <input type="email" class="form-control" id="emailInput" required />
            <div class="valid-feedback">Looks good!</div>

            <label for="addressInput" class="form-label mt-3">Address</label>
            <input
              type="text"
              class="form-control"
              id="addressInput"
              required
            />
            <div class="valid-feedback">Looks good!</div>

            <label for="phoneInput" class="form-label mt-3">Phone number</label>
            <input type="tel" class="form-control" id="phoneInput" required />
            <div class="valid-feedback">Looks good!</div>

            <label for="paymentMethod" class="form-label mt-3">Payment Method</label>
            <select class="form-select" id="paymentMethod" required>
              <option selected value="card">Card Payment</option>
              <option value="cash">Cash on Delivery</option>
            </select>
            <div class="invalid-feedback">Please select a valid method.</div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="h4 my-3">2. Order Information</div>
          <ul class="list-group mt-5" style="height: 35vh;overflow: auto;">
           
            <li class="list-group-item d-flex justify-content-center align-items-center border-none">
              <div class="card mb-2" style="width: 500px;">
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <img class="card-img" src="/Images/menu-2.jpg" alt="Suresh Dasari Card">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title">Ham Burger</h5>
                            <h6>Burgers</h6>
                            <strong class="card-text">LKR 1500 &nbsp;(<small>LKR 500 * 3 </small>)</strong>
                        </div>
                    </div>
                </div>
            </div>
            </li>

          </ul>
          <hr>
          <div class="fluid-container d-flex justify-content-center align-items-center">
            <div class="row">
              <div class="col-6"><strong>Subtotal</strong></div>
              <div class="col-6">LKR 500.0</div>
              <div class="col-6"><strong>Delivery Fee</strong></div>
              <div class="col-6">LKR 100.0</div>
            </div>
          </div>
          
          <hr>
          <div class="fluid-container d-flex justify-content-center align-items-center">
            <div class="row">
              <div class="col-6"><strong>Total</strong></div>
              <div class="col-6">LKR 600.0</div>
              <div class="col-6"><strong>Payment Method</strong></div>
              <div class="col-6">Card Payment</div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-8">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="invalidCheck"
                  required
                />
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <div class="col-4">
              <a class="btn btn-primary btn-sm " href="#" role="button">Place Order </a>
            </div>
          </div>
         <br>
        </div>
      </div>
    </div>
  </body>
</html>
