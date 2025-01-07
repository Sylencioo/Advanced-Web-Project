<?php

Gate::define('admin-actions', function ($user) {
    return $user->role === 'admin';
});

Gate::define('staff-actions', function ($user) {
    return $user->role === 'staff';
});

Gate::define('leader-actions', function ($user) {
    return $user->role === 'academician' && $user->is_leader;
});

Gate::define('member-actions', function ($user) {
    return $user->role === 'academician' && !$user->is_leader;
});
