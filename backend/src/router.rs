#![allow(unused_imports)]
#![allow(unused_attributes)]
#[macro_use] 

use rocket::response::content;

pub mod index {

    use rocket_dyn_templates::Template;
    use std::collections::HashMap;
    extern crate rocket;
    use rocket::http::CookieJar;
    use rocket::response::status;
    use rocket::form::Form;

    #[derive(FromForm)]
    pub struct IndexPost {
        _callback: String
    }

    #[post("/", data = "<input>")]
    pub fn index(cookies: &CookieJar<'_>, input: Form<IndexPost>) -> Result<Template, status::NotFound<String>> {

        let mut context: HashMap<&str, &str> = HashMap::new();

        if input._callback.is_empty() {
            status::Accepted(Some(String::from("[CZ/SK] Systém se posral")));
        }

        context.insert("callback", &input._callback);
        context.insert("test", "123");

        Ok(Template::render("index", &context))

    }

}

// Basic CRUD routes

pub mod api {

    extern crate rocket;

    use rocket::form::Form;
    use crate::redis::Redis;

    #[derive(FromForm)]
    pub struct ReadInput {
        _id: String,
        _username: String,
        _password: String,
        _email: String,
    }

    #[post("/create")]
    pub fn create() { }

    #[post("/read", data = "<input>")]
    pub fn read(input: Form<ReadInput>) -> &'static str {

        let result = match Redis::read(&input._id) {
            Ok(v) => {
                return "Jest wartosc"
            },
            Err(_) => { }
        };

        return "Test";
    }

    #[post("/update")]
    pub fn update() { }

    #[post("/delete")]
    pub fn delete() { }

}