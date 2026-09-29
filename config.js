// config.js
const SUPABASE_URL = "https://owpuyzjzmsgavontxfgs.supabase.co";
const SUPABASE_ANON_KEY = "sb_publishable_0jmziscq25_4uSaD4nZzOg_YPLGkPo2";

const ADMIN_EMAIL = "alvaroakun299@gmail.com";

const STORAGE_BUCKET = "article-images";

const supabaseClient = window.supabase.createClient(
  SUPABASE_URL,
  SUPABASE_ANON_KEY
);