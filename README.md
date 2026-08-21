<p align="center">Elemental Creatures TCG</p>

<p align="center">Elemental Creatures rules, images, and references are all copyright Justin Hartsock</p>

## This Project

My second ever Laravel project, and actually my third attempt to rebuild the site. The first attempt was with all homebrewed libraries and took approximately an age. The second attempt came with the release of the Alpha Evolved card set, where I did a full rebuild using Composer libraries to see if going without a large framework like Laravel was possible. It wasn't, so my third turn I just went back to Laravel, and the 12 hours of building I did with Composer libraries took 2 hours in Laravel. Go figure.

I'm really just leaving this here as a record of my work. Feel free to poke around. Since the card images are copyright, I haven't included them in this repository. If you're working on this repository and need those images, you'll have to secure permission from the game's creator Justin Hartsock.

Enjoy the work I've done!

## Changes from Previous Versions

The first version of the site ran on all its own libraries in PHP and Javascript created by me. This worked, and once the libraries were complete, handled a lot of the heavy lifting. There was a PHP templating engine, Javascript handlers for async api calls, and the crowning achievement was the Gallery of sortable, searchable cards from the game sets. This version was live from mid-2025 to August 2026.

The second version that never went live was worked on early August 2026. I'd started using Laravel as a development framework, and really enjoyed it, but deploying to shared hosting had a lot of considerations and difficulty. So I tried to look up popular Composer packages to piecemeal a small scaffolding. As long as it was more fully featured than the libraries I'd written, without the overhead of a big scaffolding like Laravel, it would suit. But I quickly found out two things: 1) There is a reason that frameworks like Laravel are so popular, and 2) nobody bothers to update the old Composer standalone packges because literally nobody uses them. So I either had to once again go back to my old libraries.....or just build the site on top of Laravel.

And the Laravel option was absolutely the correct choice. I re-used one or two small Javascript interactivity functions, and a lot of the original HTML, but rewrote everything else. The entire authentication system, the entire admin control panel, all the database migrations, imported all the old data from the old databases, redid a lot of the art...all in less than 48 hours total (including sleep and Minecraft breaks). This just proved the point: using Laravel for these kinds of websites is simply the superior option.

Thanks for listening to my TED talk.

## How to Configure This

This is absolutely not going to work correctly because all of the copyright images are missing, so the Gallery in particular will fail spectacularly, and there will be broken images all over your page. But to work on this, you'll need at minimum PHP, Docker Desktop, Composer, Laravel, and npm installed. Once you pull this, you'll have to run both composer update and npm update. The docker-compose should work fine with simply a docker compose up. Good luck and have fun!