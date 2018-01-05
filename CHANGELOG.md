CHANGELOG
=========

v2.0.0
------

This version breaks many of the interfaces, many of the interfaces were removed and many of them was added.
In this version we removed building the navigation by YAML definitions since it was limitting. Instead we
implemented few interfaces which define navigation items behaviour. We focused on writting extensible and
reusable code.

Here is list of all features this release contains:

 * simple container for navigation items
 * filtered container for navigation items which uses filters implementing `NavigationFilterInterface`
 * simple filtering of navigation items based on provided role
 * ability to chain multiple filters
 * multiple interfaces for navigation items wchich provide functionality for filtering based on role,
   hiding/showing the item within the navigation, nesting the items, order the items, match items
   based on multiple match rules, register items to multiple navigation instances
 * interface for matching the items by multiple match voters - we provide exact match, prefix match
   and regex match voters but you can implement any voter you want and combine them in any manner
 * simple URL prvider interface for generating URLs based on underlying navigation item - you can
   implement multiple URL providers and register them to URL provider container
 * registry for registering multiple navigation items containers

