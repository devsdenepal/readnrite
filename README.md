# Readn(W)rite API
```
Readnrite API is built to interact with Readnrite 
```
## API Features

- [`createAccount`](#createAccount)
- [`edit_user`](#edit_user)
- [`getUser`](#getUser)
- [`createPage`](#createPage)
- [`getPageList`](#getPageList)
- [`getPage`](#getPage)
- [`edit_page`](#edit_Page)
- [`refresh_key`](#refresh_key)

## Installation
> git clone https://github.com/devsdenepal/readnrite.git

## Requirements
- PHP Version: 8.2.4
- Server (Backend): 10.4.28-MariaDB

## Setup
- Create databse : readnrite
- Import table SQL from `sample/sql/`
- Start all service/server from your c.panel (xampp suggested for study purpose)

## API Functions
<table>
<tr>
<td>Function</td>
<td>Description</td>
<td>Params</td>
<td>Returns</td>
</tr>
<tr id="createAccount">
<td><code>createAccount</code></td>
<td>create readnrite account </td>
<td><code>short_name</code>, <code>author_name</code></td>
<td><code>short_name</code>, <code>author_name</code>, <code>date_created</code>, <code>user_id</code>, <code>user_key</code></td> 
</tr>
<tr id="createPage">
<td><code>createPage</code></td>
<td>create readnrite page </td>
<td><code>author_name</code>, <code>title</code>, <code>content</code>, <code>user_id</code>, <code> user_key</code></td>
<td> <code>title</code>, <code>description</code>, <code>content</code>, <code>date_created</code>, <code>page_id</code>, <code>page_url</code></td> 
</tr>
<tr id="edit_Page">
<td><code>editPage</code></td>
<td>edit readnrite page </td>
<td><code>author_name</code>, <code>title</code>, <code>content</code>, <code> user_key</code></td>
<td><code>title</code>, <code>content</code>, <code>page_description</code>, <code>date_created</code>, <code>page_id</code>, <code>page_url</code></td> 
</tr>
<tr id="edit_user">
<td><code>edit_user</code></td>
<td>edit readnrite account </td>
<td><code>short_name</code>, <code>author_name</code>, <code> user_key</code></td>
<td><code>short_name</code>, <code>author_name</code>, <code>user_id</code></td> 
</tr>
<tr id="getPage">
<td><code>getPage</code></td>
<td>create readnrite account </td>
<td><code>page_id</code>, <code>user_key</code></td>
<td><code>title</code>, <code>content</code>, <code>page_description</code>, <code>date_created</code>, <code>page_id</code>, <code>page_url</code>,<code> page_url</code><code>views</code></td> 
</tr>
<tr  id="getPageList">
<td><code>getPageList</code></td>
<td>get list of pages authored by the user </td>
<td><code>user_id</code></td>
<td><code>title</code>, <code>content</code>, <code>page_description</code>, <code>date_created</code>, <code>page_id</code>, <code>page_url</code>,<code> page_url</td> </td> 
</tr>
<tr  id="getUser">
<td><code>getUser</code></td>
<td>get information about readnrite account </td>
<td><code>user_id</code></td>
<td><code>short_name</code>, <code>author_name</code>, <code>date_created</code>, <code>date_created</code>, <code>pages_authored</code></td> 
</tr>
<tr id="refresh_key">
<td><code>refresh_key</code></td>
<td>regenerate <code>user_key</code></td>
<td><code>user_key</code> (old)</td>
<td><code>user_key</code> (new)
</tr>
</table>