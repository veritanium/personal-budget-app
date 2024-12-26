<p style="display: flex; align-items: center; justify-content: center;"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p style="display: flex; align-items: center; justify-content: center;">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Personal Budget Tool

This is a simple web application built on Laravel and SQLite for simple family and personal accounting and budgeting

## To Do

- User access
  - [x] Remove registration from public
  - [ ] Only admin can create users
  - [ ] Admin can see every budget
  - [x] Create roles
  - [ ] Create policies
- Create Budget
    - [x]  Has name (e.g. Family Budget)
    - [x] Assigned to creating user 
- Create periods
  - [ ] Has name (e.g. January Period 1)
  - [ ] Has time range (period)
  - [ ] Has budget_items of how income will be spent - has categories
  - [ ] Accesses ledger for given time range both debits and credits
- Create categories
  - [x] Name, budget_id
- Create Accounts
  - [ ] id, budget_id, name, account_number (last four), bank name, bank address
- Create budget_items (period_category)
    - [ ] id, period_id, category_id, amount (cents)
- Create tags
  - [ ] Tags are for further describing the broad categories for future statistical analysis
  - [ ] e.g. Gaia.com could have category of entertainment but tags of 'non-essential' and 'steaming'
  - [ ] Create pivot table for budget_item_tag
- Create transactions (ledger)
    - [ ] Tracks debits and credits and transfer 
    - [ ] Has categories, tags, and accounts
    - [ ] Debits have from account
    - [ ] Credits have to account
    - [ ] Transfers create two ledger entries - 1 debit and 1 credit for the respective accounts, tags, and categories
    - [ ] id, budget_id, title, description (optional), type (debit, credit), amount (cents), account_id, category_id (optional but strongly encouraged)
- [ ] Create pivot table for ledger_tag
- [ ] Create view of budgets
    - [ ] Views List of available budgets
- Create view of periods (like 1 month view containing two period views)
    - [ ] Views calculate and display totals of income and outgoing and balances within certain categories and accounts
    - [ ] have name and pivot table period_view_period
    - [ ] Can also be used to create end-of year analysis view 
- Create analysis views
  - [ ] Period_views can be locked if they are past their time range and calculated for static storage
  - [ ] Graphs will then be generated to show financial patterns
  - [ ] Items calculated will be total
- [ ] Create deployment to prod server environment

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
