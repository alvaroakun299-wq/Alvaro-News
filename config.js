// config.js
// ==========================================
// BACKUP API LAMA - GOOGLE APPS SCRIPT
// ==========================================
const API_URL = "https://script.google.com/macros/s/AKfycbyx4tEBeWK63ilmVp409aH5FH_5sfk83ykucwOBQYIctYSgn8ffPjMOfUEECaDY6kka/exec";

// ==========================================
// SUPABASE
// ==========================================
const SUPABASE_URL = "https://owpuyzjzmsgavontxfgs.supabase.co";

const SUPABASE_ANON_KEY = "sb_publishable_0jmziscq25_4uSaD4nZzOg_YPLGkPo2";

const supabaseClient = window.supabase.createClient(
    SUPABASE_URL,
    SUPABASE_ANON_KEY
);