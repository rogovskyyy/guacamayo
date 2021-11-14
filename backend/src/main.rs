#[macro_use] 
extern crate rocket;
use rocket::response::content;

extern crate rocket_dyn_templates;
use rocket_dyn_templates::Template;

mod session;
mod router;

// Transaction Id
// Login
// Password
// Time
// JWT
// Callback

#[launch]
fn rocket() -> _ {
    rocket::build()

        // Main path
        .mount("/", routes![
            router::index::index,
            router::index::login
        ])

        // API path
        .mount("/api", routes![
            router::api::create,
            router::api::read,
            router::api::update,
            router::api::delete,
        ])

        // Attach template engine
        .attach(Template::fairing())
}