# Magerun2 delete products module
[Magerun 2](https://github.com/netz98/n98-magerun2/) module to delete products from a Magento 2 store 

Installation
------------

1. Clone in the n98-magerun modules folder

        cd ~/.n98-magerun2/modules/ && git clone https://github.com/AquiveMedia/magerun2-delete-products.git aquivemedia-addons

Commands
--------

```bash
$ magerun2 products:delete
```
Warning
--------
With great power comes great responsibility. This is my first (experimental) magerun module. It is realy basic and it is untested (ok, I ran it twice). Try to use it on a development(!) environment only.

Todo
--------
- prompt to ask if the user is sure to proceed
- (performance) tests

Possible features to implement
--------

- delete based on product id list
- delete based on product sku list
