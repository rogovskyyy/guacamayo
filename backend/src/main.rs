#![allow(unused_imports)]
#![feature(proc_macro_hygiene, decl_macro)]
#[macro_use] 
extern crate rocket;
use rocket::{
    fs::FileServer,
    response::content
};

extern crate rocket_dyn_templates;
use rocket_dyn_templates::Template;

use rocket_contrib::serve::StaticFiles;

mod redis;
mod router;
mod database;

#[launch]
fn rocket() -> _ {
    rocket::build()

        // Main path
        .mount("/", routes![
            router::index::index,
        ])

        .mount("/api", routes![
            router::api::create,
            router::api::read,
            router::api::update,
            router::api::delete,
        ])

        // Content Delivery Network
        .mount("/public", FileServer::from("static/"))
        
        // Attach template engine
        .attach(Template::fairing())
}