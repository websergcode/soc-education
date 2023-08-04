Laravel Sail installer
.env force added to git for speed clone and run project (i know who is not safe)

composer install
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up -d
sail artisan migrate

