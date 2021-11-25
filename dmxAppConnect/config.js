dmx.config({
  "new": {
    "api1": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "number",
                "name": "votes"
              },
              {
                "type": "number",
                "name": "voteweight"
              },
              {
                "type": "number",
                "name": "promote"
              },
              {
                "type": "boolean",
                "name": "paid"
              },
              {
                "type": "text",
                "name": "url"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "repeat1": {
      "meta": null,
      "outputType": "text"
    }
  },
  "index": {
    "tradefts": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "from"
              },
              {
                "type": "text",
                "name": "to"
              },
              {
                "type": "number",
                "name": "price"
              },
              {
                "type": "text",
                "name": "item"
              },
              {
                "type": "text",
                "name": "kind"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "text",
            "name": "kind"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "tradenfts": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "from"
              },
              {
                "type": "text",
                "name": "to"
              },
              {
                "type": "number",
                "name": "price"
              },
              {
                "type": "text",
                "name": "item"
              },
              {
                "type": "text",
                "name": "kind"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "text",
            "name": "kind"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "trade-nft-cards": {
      "meta": [
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "text",
          "name": "to"
        },
        {
          "type": "number",
          "name": "price"
        },
        {
          "type": "text",
          "name": "item"
        },
        {
          "type": "text",
          "name": "kind"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "inventory-trades": {
      "meta": [
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "text",
          "name": "to"
        },
        {
          "type": "number",
          "name": "price"
        },
        {
          "type": "text",
          "name": "item"
        },
        {
          "type": "text",
          "name": "kind"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    }
  }
});
