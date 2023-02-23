<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function set(Request $request)
    {
        $cookie = $request->id;
        $oldCookie = Cookie::get('mode');
        $oldCookieHasNewCookie = str_contains($oldCookie, $cookie);
        $oldCookieHasFont = str_contains($oldCookie, 'font');
        $oldCookieHasStyle = str_contains($oldCookie, 'style');
        $requestHasFont = str_contains($cookie, 'font');

        if ($oldCookie == $cookie) {
            return $this->destroy();
        }
        else if ($oldCookieHasNewCookie) {
            return $this->revert($oldCookie, $cookie);
        }
        else if (($requestHasFont && $oldCookie) && !$oldCookieHasFont) {
            return $this->update($oldCookie, $cookie);
        }
        else if ($oldCookieHasFont && $requestHasFont) {
            return $this->changeFont($oldCookie, $cookie);
        }
        else if ($oldCookieHasFont && $oldCookieHasStyle) {
            return $this->changeStyle($oldCookie, $cookie);
        }
        else if ($oldCookieHasFont) {
            return $this->add($oldCookie, $cookie);
        }

        return response($request)->withCookie(cookie()->forever('mode', $cookie));
    }

    public function get()
    {
        return Cookie::get('mode');
    }

    private function add($oldCookie, $cookie) {
        return response($cookie . ' added successfully')->withCookie(cookie()->forever('mode', $oldCookie . ' ' . $cookie));
    }

    private function revert($oldCookie, $cookie) {
        return response($cookie . ' reverted successfully')->withCookie(cookie()->forever('mode', str_replace($cookie, '', $oldCookie)));
    }

    private function update($oldCookie, $cookie) {
        return response($cookie . ' updated successfully')->withCookie(cookie()->forever('mode', $oldCookie . ' ' . $cookie));
    }

    private function changeFont($oldCookie, $cookie) {
        foreach (explode(' ', $oldCookie) as $word) {
            if(str_contains($word, 'font')) {
                return response($cookie . ' reverted successfully')->withCookie(cookie()->forever('mode', str_replace($word, $cookie, $oldCookie)));
            }
        }
    }

    private function changeStyle($oldCookie, $cookie) {
        foreach (explode(' ', $oldCookie) as $word) {
            if(str_contains($word, 'style')) {
                return response($cookie . ' reverted successfully')->withCookie(cookie()->forever('mode', str_replace($word, $cookie, $oldCookie)));
            }
        }
    }

    public function destroy() {
        return response('All mode cookies deleted successfully')->withCookie(cookie('mode', null, 0));
    }
}
