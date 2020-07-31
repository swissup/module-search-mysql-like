# module-search-mysql-like
 
Magento 2.2-2.3 module for mysql search with LIKE

## Installation

### For clients

There are several ways to install extension for clients:

 1. If you've bought the product at Magento's Marketplace - use
    [Marketplace installation instructions](https://docs.magento.com/marketplace/user_guide/buyers/install-extension.html)
 2. Otherwise, you have two options:
    - Install the sources directly from [our repository](https://docs.swissuplabs.com/m2/extensions/ajaxsearch/installation/composer/) - **recommended**
    - Download archive and use [manual installation](https://docs.swissuplabs.com/m2/extensions/ajaxsearch/installation/manual/)

### For developers

Use this approach if you have access to our private repositories!

```bash
composer config repositories.swissup composer https://docs.swissuplabs.com/packages/
composer require swissup/module-search-mysql-like:dev-master --prefer-source
bin/magento module:enable Swissup_SearchMysqlLike
bin/magento setup:upgrade
```
