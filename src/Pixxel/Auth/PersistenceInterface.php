<?php

namespace Pixxel\Auth;

/**
 * Interface for persitence-handling (keep the user logged in), these could be session-handlers, but also token-handlers (for instance apps do not use sessions for their server requests, but either use a token or something like jwt)
 */
interface PersistenceInterface
{
    public function __construct($data = []);    // Initialize with custom parameters, such a session handling library or jwt library and configuration parameters
    // CONFIG methods
    public function setUpdateOnRefresh(bool $update);
    public function getUpdateOnRefresh(): bool;

    // Common methods
    public function login($data = []);          // Login a user with the specified data
    public function isLoggedIn();               // Verify the current user, either with sessions or tokens or something else
    public function refresh(array $user);                  // Purge the current session
    public function getUser();                  // Get the current user
    public function logout();                   // If you use sessions, logout the current user
}
