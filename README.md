# DESCRIPTION #

## Acme Widget Co ##

### Acme Widget Co are the leading provider of made up widgets and they’ve contracted you to create a proof of concept for their new sales system. ###

- They sell three products
  - Red Widget R01 $32.95
  - Green Widget G01 $24.95
  - Blue Widget B01 $7.95

- To incentivise customers to spend more, delivery costs are reduced based on the amount
spent. Orders under $50 cost $4.95. For orders under $90, delivery costs $2.95. Orders of
$90 or more have free delivery.

- They are also experimenting with special offers. The initial offer will be “buy one red widget,
get the second half price”.

- Your job is to implement the basket which needs to have the following interface –
  - It is initialised with the product catalogue, delivery charge rules, and offers (the format of how these are passed it up to you)
  - It has an add method that takes the product code as a parameter.
  - It has a total method that returns the total cost of the basket, taking into account the delivery and offer rules.

- Here are some example baskets and expected totals to help you check your implementation.
  - Products Total
    - B01, G01 $37.85
    - R01, R01 $54.37
    - R01, G01 $60.85
    - B01, B01, R01, R01, R01 $98.27

# HOW IT WORKS #
- Developed on the XAMPP Apache distribution (PHP 8.2.12)
  - https://www.apachefriends.org/download.html
- Initializes a run-time script that:
  - Loads available stores into a basket
  - Loads the product lines from the stores
  - Adds a product to a basket
  - Calculates shipping and special offers
  - Returns total

# ASSUMPTIONS #
- Shipping costs calculated after special offers
- Special offers applied to every cumulative purchase rather than just once
- Other stores would be added for future development
