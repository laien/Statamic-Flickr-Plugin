Statamic Flickr Plugin
================================

The Flickr plugin is used for fetching and displaying photos from Flickr's API. Starting with photosets. Great for galleries. 

By the way, this plugin is totaly inspired by Jack McDade's great [Plugin for Dribbble](https://github.com/statamic/Plugin-Dribbble).


## Installing
1. Download the zip file (or clone via git) and unzip it or clone the repo into `/_add-ons/`.
2. Ensure the folder name is `flickr`.
3. Go to [Flickr - Create an App](http://www.flickr.com/services/apps/create/) and create your own app.
4. Copy the API key into the plugin


## Tag Pair: *:Sets*

**Example Tag**

    {{ flickr:sets id="72157625970225029" }}
    <h1>Photos by {{ ownername }}</h1>
      {{ photo }}
        <div class="photo">
          <img src="{{ url_m }}" title="{{ title }}" />
        </div>
      {{ /photo }}
    {{ /flickr:sets }}

### Parameters

#### ID `id`

Id of the set you wish to request.

    id="72157625970225029"

#### Limit `limit`
**Default:** 5

Limit the number of photos returned.

### Variables & Variable Pairs
- `{{ id }}`
- `{{ primary }}`
- `{{ owner }}`
- `{{ ownername }}`

#### Variable Pair: *:Photo*

    {{ photo }} {{ /photo }}

- `{{ id }}`
- `{{ secret }}`
- `{{ server }}`
- `{{ farm }}`
- `{{ title }}`
- `{{ image_teaser_url }}`
- `{{ isprimary }}`
- `{{ url_m }}`  (Medium)
- `{{ height_m }}`
- `{{ width_m }}`
- `{{ url_l }}` (Large)
- `{{ height_l }}`
- `{{ width_l }}`

You can read more about [Flickr´s API Method - flickr.photosets.getPhotos](http://www.flickr.com/services/api/flickr.photosets.getPhotos.html).


Have fun :)
