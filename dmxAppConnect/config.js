dmx.config({
  "index": {
    "blogResult": {
      "meta": [
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "url"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "array",
          "name": "beneficiaries"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "text",
            "name": "jsonrpc"
          },
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
                "type": "text",
                "name": "category"
              },
              {
                "type": "text",
                "name": "title"
              },
              {
                "type": "text",
                "name": "body"
              },
              {
                "type": "text",
                "name": "json_metadata"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "text",
                "name": "last_update"
              },
              {
                "type": "number",
                "name": "depth"
              },
              {
                "type": "number",
                "name": "children"
              },
              {
                "type": "text",
                "name": "last_payout"
              },
              {
                "type": "text",
                "name": "cashout_time"
              },
              {
                "type": "text",
                "name": "total_payout_value"
              },
              {
                "type": "text",
                "name": "curator_payout_value"
              },
              {
                "type": "text",
                "name": "pending_payout_value"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "body_length"
              },
              {
                "type": "number",
                "name": "author_reputation"
              },
              {
                "type": "text",
                "name": "parent_author"
              },
              {
                "type": "text",
                "name": "parent_permlink"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "text",
                "name": "root_title"
              },
              {
                "type": "array",
                "name": "beneficiaries"
              },
              {
                "type": "text",
                "name": "max_accepted_payout"
              },
              {
                "type": "number",
                "name": "percent_hbd"
              },
              {
                "type": "number",
                "name": "post_id"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "text",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "number",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  }
                ]
              }
            ]
          },
          {
            "type": "number",
            "name": "id"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ],
    "data_detail1": {
      "meta": [
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "url"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "array",
          "name": "beneficiaries"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "sales": [
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
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "object",
                "name": "price",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "text",
                "name": "time"
              },
              {
                "type": "text",
                "name": "by"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "array",
            "name": "mint",
            "sub": [
              {
                "type": "array",
                "name": "$value",
                "sub": [
                  {
                    "type": "text",
                    "name": "set"
                  },
                  {
                    "type": "array",
                    "name": "items",
                    "sub": [
                      {
                        "type": "object",
                        "name": "price",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "time"
                      },
                      {
                        "type": "text",
                        "name": "by"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "script"
                  }
                ]
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ],
    "data_view1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "salesMint": {
      "meta": [
        {
          "type": "array",
          "name": "$value",
          "sub": [
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "array",
              "name": "items",
              "sub": [
                {
                  "type": "object",
                  "name": "price",
                  "sub": [
                    {
                      "type": "number",
                      "name": "amount"
                    },
                    {
                      "type": "number",
                      "name": "precision"
                    },
                    {
                      "type": "text",
                      "name": "token"
                    }
                  ]
                },
                {
                  "type": "text",
                  "name": "time"
                },
                {
                  "type": "text",
                  "name": "by"
                }
              ]
            },
            {
              "type": "text",
              "name": "script"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "repeat1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "repeatmint": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "array",
          "name": "items",
          "sub": [
            {
              "type": "object",
              "name": "price",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "text",
              "name": "time"
            },
            {
              "type": "text",
              "name": "by"
            }
          ]
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeatmint1": {
      "meta": [
        {
          "type": "array",
          "name": "$value",
          "sub": [
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "array",
              "name": "items",
              "sub": [
                {
                  "type": "object",
                  "name": "price",
                  "sub": [
                    {
                      "type": "number",
                      "name": "amount"
                    },
                    {
                      "type": "number",
                      "name": "precision"
                    },
                    {
                      "type": "text",
                      "name": "token"
                    }
                  ]
                },
                {
                  "type": "text",
                  "name": "time"
                },
                {
                  "type": "text",
                  "name": "by"
                }
              ]
            },
            {
              "type": "text",
              "name": "script"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "repeatmint2": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "array",
          "name": "items",
          "sub": [
            {
              "type": "object",
              "name": "price",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "text",
              "name": "time"
            },
            {
              "type": "text",
              "name": "by"
            }
          ]
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeatmint3": {
      "meta": [
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        }
      ],
      "outputType": "array"
    },
    "auctions": [
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
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "object",
                "name": "price",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "object",
                "name": "initial_price",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "text",
                "name": "time"
              },
              {
                "type": "text",
                "name": "by"
              },
              {
                "type": "number",
                "name": "bids"
              },
              {
                "type": "text",
                "name": "bidder"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "number",
                "name": "days"
              },
              {
                "type": "text",
                "name": "buy"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ],
    "auctionsMint": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "auctionsToken": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "inventory_iterator": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "inventory_detail": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
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
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "text",
                "name": "owner"
              }
            ]
          },
          {
            "type": "object",
            "name": "set",
            "sub": [
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "link"
              },
              {
                "type": "object",
                "name": "fee",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "object",
                "name": "bond",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "text",
                "name": "encoding"
              },
              {
                "type": "number",
                "name": "type"
              },
              {
                "type": "text",
                "name": "royalty"
              },
              {
                "type": "text",
                "name": "name"
              },
              {
                "type": "number",
                "name": "minted"
              },
              {
                "type": "number",
                "name": "max"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "dataView1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "iterator1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "detail1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "auctions_iterator": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "dataView2": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "link"
        },
        {
          "type": "object",
          "name": "fee",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "object",
          "name": "bond",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "encoding"
        },
        {
          "type": "number",
          "name": "type"
        },
        {
          "type": "text",
          "name": "royalty"
        },
        {
          "type": "text",
          "name": "name"
        },
        {
          "type": "number",
          "name": "minted"
        },
        {
          "type": "number",
          "name": "max"
        }
      ],
      "outputType": "object"
    },
    "detail2": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "link"
        },
        {
          "type": "object",
          "name": "fee",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "object",
          "name": "bond",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "encoding"
        },
        {
          "type": "number",
          "name": "type"
        },
        {
          "type": "text",
          "name": "royalty"
        },
        {
          "type": "text",
          "name": "name"
        },
        {
          "type": "number",
          "name": "minted"
        },
        {
          "type": "number",
          "name": "max"
        }
      ],
      "outputType": "object"
    },
    "hivesellsrepeat": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "text",
          "name": "owner"
        }
      ],
      "outputType": "array"
    },
    "dex": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "markets",
            "sub": [
              {
                "type": "object",
                "name": "hbd",
                "sub": [
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells"
                  },
                  {
                    "type": "array",
                    "name": "buys"
                  }
                ]
              },
              {
                "type": "object",
                "name": "hive",
                "sub": [
                  {
                    "type": "object",
                    "name": "buyOrders",
                    "sub": [
                      {
                        "type": "object",
                        "name": "0.220022:DLUXQmaPZiLTTpFKTyyhe3ATuAoU2S2mKLWJHtU4wnWkddwGgm",
                        "sub": [
                          {
                            "type": "text",
                            "name": "agent"
                          },
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "approvals"
                          },
                          {
                            "type": "boolean",
                            "name": "approveAgent"
                          },
                          {
                            "type": "boolean",
                            "name": "approve_to"
                          },
                          {
                            "type": "key_array",
                            "name": "auths",
                            "sub": [
                              {
                                "type": "text",
                                "name": "0"
                              },
                              {
                                "type": "object",
                                "name": "1",
                                "sub": [
                                  {
                                    "type": "text",
                                    "name": "0"
                                  },
                                  {
                                    "type": "object",
                                    "name": "1",
                                    "sub": [
                                      {
                                        "type": "text",
                                        "name": "agent"
                                      },
                                      {
                                        "type": "number",
                                        "name": "escrow_id"
                                      },
                                      {
                                        "type": "text",
                                        "name": "from"
                                      },
                                      {
                                        "type": "text",
                                        "name": "to"
                                      },
                                      {
                                        "type": "text",
                                        "name": "who"
                                      }
                                    ]
                                  }
                                ]
                              }
                            ]
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "eo"
                          },
                          {
                            "type": "number",
                            "name": "escrow"
                          },
                          {
                            "type": "number",
                            "name": "escrow_id"
                          },
                          {
                            "type": "text",
                            "name": "expire_path"
                          },
                          {
                            "type": "text",
                            "name": "fee"
                          },
                          {
                            "type": "text",
                            "name": "from"
                          },
                          {
                            "type": "number",
                            "name": "hbd"
                          },
                          {
                            "type": "number",
                            "name": "hive"
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "object",
                            "name": "reject",
                            "sub": [
                              {
                                "type": "text",
                                "name": "0"
                              },
                              {
                                "type": "object",
                                "name": "1",
                                "sub": [
                                  {
                                    "type": "text",
                                    "name": "0"
                                  },
                                  {
                                    "type": "object",
                                    "name": "1",
                                    "sub": [
                                      {
                                        "type": "text",
                                        "name": "agent"
                                      },
                                      {
                                        "type": "number",
                                        "name": "escrow_id"
                                      },
                                      {
                                        "type": "text",
                                        "name": "from"
                                      },
                                      {
                                        "type": "text",
                                        "name": "hbd_amount"
                                      },
                                      {
                                        "type": "text",
                                        "name": "hive_amount"
                                      },
                                      {
                                        "type": "text",
                                        "name": "receiver"
                                      },
                                      {
                                        "type": "text",
                                        "name": "to"
                                      },
                                      {
                                        "type": "text",
                                        "name": "who"
                                      }
                                    ]
                                  }
                                ]
                              }
                            ]
                          },
                          {
                            "type": "text",
                            "name": "tagent"
                          },
                          {
                            "type": "text",
                            "name": "txid"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          },
                          {
                            "type": "text",
                            "name": "key"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "his",
                    "sub": [
                      {
                        "type": "object",
                        "name": "58385865:a7736ef00332eb898a860f7021298992680821b9",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "text",
                            "name": "timestamp"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "key_array",
                    "name": "sellOrders",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "co"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "co"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "buys",
                    "sub": [
                      {
                        "type": "text",
                        "name": "agent"
                      },
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "approvals"
                      },
                      {
                        "type": "boolean",
                        "name": "approveAgent"
                      },
                      {
                        "type": "boolean",
                        "name": "approve_to"
                      },
                      {
                        "type": "key_array",
                        "name": "auths",
                        "sub": [
                          {
                            "type": "text",
                            "name": "0"
                          },
                          {
                            "type": "object",
                            "name": "1",
                            "sub": [
                              {
                                "type": "text",
                                "name": "0"
                              },
                              {
                                "type": "object",
                                "name": "1",
                                "sub": [
                                  {
                                    "type": "text",
                                    "name": "agent"
                                  },
                                  {
                                    "type": "number",
                                    "name": "escrow_id"
                                  },
                                  {
                                    "type": "text",
                                    "name": "from"
                                  },
                                  {
                                    "type": "text",
                                    "name": "to"
                                  },
                                  {
                                    "type": "text",
                                    "name": "who"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "eo"
                      },
                      {
                        "type": "number",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrow_id"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "text",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "object",
                        "name": "reject",
                        "sub": [
                          {
                            "type": "text",
                            "name": "0"
                          },
                          {
                            "type": "object",
                            "name": "1",
                            "sub": [
                              {
                                "type": "text",
                                "name": "0"
                              },
                              {
                                "type": "object",
                                "name": "1",
                                "sub": [
                                  {
                                    "type": "text",
                                    "name": "agent"
                                  },
                                  {
                                    "type": "number",
                                    "name": "escrow_id"
                                  },
                                  {
                                    "type": "text",
                                    "name": "from"
                                  },
                                  {
                                    "type": "text",
                                    "name": "hbd_amount"
                                  },
                                  {
                                    "type": "text",
                                    "name": "hive_amount"
                                  },
                                  {
                                    "type": "text",
                                    "name": "receiver"
                                  },
                                  {
                                    "type": "text",
                                    "name": "to"
                                  },
                                  {
                                    "type": "text",
                                    "name": "who"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "tagent"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "text",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            "type": "key_array",
            "name": "queue",
            "sub": [
              {
                "type": "number",
                "name": "c"
              },
              {
                "type": "number",
                "name": "g"
              },
              {
                "type": "number",
                "name": "l"
              },
              {
                "type": "number",
                "name": "t"
              }
            ]
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "minty": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "type": "array",
          "name": "$value",
          "sub": [
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "array",
              "name": "items",
              "sub": [
                {
                  "type": "object",
                  "name": "price",
                  "sub": [
                    {
                      "type": "number",
                      "name": "amount"
                    },
                    {
                      "type": "number",
                      "name": "precision"
                    },
                    {
                      "type": "text",
                      "name": "token"
                    }
                  ]
                },
                {
                  "type": "text",
                  "name": "time"
                },
                {
                  "type": "text",
                  "name": "by"
                }
              ]
            },
            {
              "type": "text",
              "name": "script"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "mintsales": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "inventoryapi": [
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
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "number",
                "name": "type"
              },
              {
                "type": "text",
                "name": "encoding"
              }
            ]
          },
          {
            "type": "array",
            "name": "mint_tokens",
            "sub": [
              {
                "type": "number",
                "name": "qty"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "number",
                "name": "type"
              },
              {
                "type": "text",
                "name": "encoding"
              }
            ]
          },
          {
            "type": "text",
            "name": "user"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "inventorydata": [
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
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "number",
                "name": "type"
              },
              {
                "type": "text",
                "name": "encoding"
              }
            ]
          },
          {
            "type": "array",
            "name": "mint_tokens",
            "sub": [
              {
                "type": "number",
                "name": "qty"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "script"
              },
              {
                "type": "number",
                "name": "type"
              },
              {
                "type": "text",
                "name": "encoding"
              }
            ]
          },
          {
            "type": "text",
            "name": "user"
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ],
    "mint_detail": {
      "meta": [
        {
          "type": "number",
          "name": "qty"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "number",
          "name": "type"
        },
        {
          "type": "text",
          "name": "encoding"
        }
      ],
      "outputType": "array"
    },
    "mint_iterator": {
      "meta": [
        {
          "type": "number",
          "name": "qty"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        },
        {
          "type": "number",
          "name": "type"
        },
        {
          "type": "text",
          "name": "encoding"
        }
      ],
      "outputType": "array"
    },
    "inventoryview": {
      "meta": [
        {
          "type": "array",
          "name": "result",
          "sub": [
            {
              "type": "text",
              "name": "uid"
            },
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "text",
              "name": "script"
            },
            {
              "type": "number",
              "name": "type"
            },
            {
              "type": "text",
              "name": "encoding"
            }
          ]
        },
        {
          "type": "array",
          "name": "mint_tokens",
          "sub": [
            {
              "type": "number",
              "name": "qty"
            },
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "text",
              "name": "script"
            },
            {
              "type": "number",
              "name": "type"
            },
            {
              "type": "text",
              "name": "encoding"
            }
          ]
        },
        {
          "type": "text",
          "name": "user"
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
      ],
      "outputType": "object"
    },
    "dluxList": [
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
    "dluxCards": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
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
      ],
      "outputType": "array"
    }
  },
  "apps": {
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "id"
              },
              {
                "type": "text",
                "name": "name"
              },
              {
                "type": "object",
                "name": "owner",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "object",
                "name": "active",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "object",
                "name": "posting",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "text",
                "name": "memo_key"
              },
              {
                "type": "text",
                "name": "json_metadata"
              },
              {
                "type": "text",
                "name": "posting_json_metadata"
              },
              {
                "type": "text",
                "name": "proxy"
              },
              {
                "type": "text",
                "name": "last_owner_update"
              },
              {
                "type": "text",
                "name": "last_account_update"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "boolean",
                "name": "mined"
              },
              {
                "type": "text",
                "name": "recovery_account"
              },
              {
                "type": "text",
                "name": "last_account_recovery"
              },
              {
                "type": "text",
                "name": "reset_account"
              },
              {
                "type": "number",
                "name": "comment_count"
              },
              {
                "type": "number",
                "name": "lifetime_vote_count"
              },
              {
                "type": "number",
                "name": "post_count"
              },
              {
                "type": "boolean",
                "name": "can_vote"
              },
              {
                "type": "object",
                "name": "voting_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "object",
                "name": "downvote_manabar",
                "sub": [
                  {
                    "type": "number",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "number",
                "name": "voting_power"
              },
              {
                "type": "text",
                "name": "balance"
              },
              {
                "type": "text",
                "name": "savings_balance"
              },
              {
                "type": "text",
                "name": "hbd_balance"
              },
              {
                "type": "text",
                "name": "hbd_seconds"
              },
              {
                "type": "text",
                "name": "hbd_seconds_last_update"
              },
              {
                "type": "text",
                "name": "hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "savings_hbd_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds_last_update"
              },
              {
                "type": "text",
                "name": "savings_hbd_last_interest_payment"
              },
              {
                "type": "number",
                "name": "savings_withdraw_requests"
              },
              {
                "type": "text",
                "name": "reward_hbd_balance"
              },
              {
                "type": "text",
                "name": "reward_hive_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_hive"
              },
              {
                "type": "text",
                "name": "vesting_shares"
              },
              {
                "type": "text",
                "name": "delegated_vesting_shares"
              },
              {
                "type": "text",
                "name": "received_vesting_shares"
              },
              {
                "type": "text",
                "name": "vesting_withdraw_rate"
              },
              {
                "type": "text",
                "name": "post_voting_power"
              },
              {
                "type": "text",
                "name": "next_vesting_withdrawal"
              },
              {
                "type": "number",
                "name": "withdrawn"
              },
              {
                "type": "number",
                "name": "to_withdraw"
              },
              {
                "type": "number",
                "name": "withdraw_routes"
              },
              {
                "type": "number",
                "name": "pending_transfers"
              },
              {
                "type": "number",
                "name": "curation_rewards"
              },
              {
                "type": "number",
                "name": "posting_rewards"
              },
              {
                "type": "array",
                "name": "proxied_vsf_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "number",
                "name": "witnesses_voted_for"
              },
              {
                "type": "text",
                "name": "last_post"
              },
              {
                "type": "text",
                "name": "last_root_post"
              },
              {
                "type": "text",
                "name": "last_vote_time"
              },
              {
                "type": "number",
                "name": "post_bandwidth"
              },
              {
                "type": "number",
                "name": "pending_claimed_accounts"
              },
              {
                "type": "array",
                "name": "delayed_votes"
              },
              {
                "type": "text",
                "name": "vesting_balance"
              },
              {
                "type": "number",
                "name": "reputation"
              },
              {
                "type": "array",
                "name": "transfer_history"
              },
              {
                "type": "array",
                "name": "market_history"
              },
              {
                "type": "array",
                "name": "post_history"
              },
              {
                "type": "array",
                "name": "vote_history"
              },
              {
                "type": "array",
                "name": "other_history"
              },
              {
                "type": "array",
                "name": "witness_votes"
              },
              {
                "type": "array",
                "name": "tags_usage"
              },
              {
                "type": "array",
                "name": "guest_bloggers"
              }
            ]
          },
          {
            "type": "number",
            "name": "id"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "blogResult": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    },
    "data_detail1": {
      "meta": [
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    },
    "data_detail": {
      "meta": [
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    },
    "dluxGetAccount": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "object",
                "name": "active",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "text",
                "name": "balance"
              },
              {
                "type": "boolean",
                "name": "can_vote"
              },
              {
                "type": "number",
                "name": "comment_count"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "number",
                "name": "curation_rewards"
              },
              {
                "type": "array",
                "name": "delayed_votes"
              },
              {
                "type": "text",
                "name": "delegated_vesting_shares"
              },
              {
                "type": "object",
                "name": "downvote_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "array",
                "name": "guest_bloggers"
              },
              {
                "type": "text",
                "name": "hbd_balance"
              },
              {
                "type": "text",
                "name": "hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "hbd_seconds"
              },
              {
                "type": "text",
                "name": "hbd_seconds_last_update"
              },
              {
                "type": "number",
                "name": "id"
              },
              {
                "type": "text",
                "name": "json_metadata"
              },
              {
                "type": "text",
                "name": "last_account_recovery"
              },
              {
                "type": "text",
                "name": "last_account_update"
              },
              {
                "type": "text",
                "name": "last_owner_update"
              },
              {
                "type": "text",
                "name": "last_post"
              },
              {
                "type": "text",
                "name": "last_root_post"
              },
              {
                "type": "text",
                "name": "last_vote_time"
              },
              {
                "type": "number",
                "name": "lifetime_vote_count"
              },
              {
                "type": "array",
                "name": "market_history"
              },
              {
                "type": "text",
                "name": "memo_key"
              },
              {
                "type": "boolean",
                "name": "mined"
              },
              {
                "type": "text",
                "name": "name"
              },
              {
                "type": "text",
                "name": "next_vesting_withdrawal"
              },
              {
                "type": "array",
                "name": "other_history"
              },
              {
                "type": "object",
                "name": "owner",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "number",
                "name": "pending_claimed_accounts"
              },
              {
                "type": "number",
                "name": "pending_transfers"
              },
              {
                "type": "number",
                "name": "post_bandwidth"
              },
              {
                "type": "number",
                "name": "post_count"
              },
              {
                "type": "array",
                "name": "post_history"
              },
              {
                "type": "text",
                "name": "post_voting_power"
              },
              {
                "type": "object",
                "name": "posting",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "text",
                "name": "posting_json_metadata"
              },
              {
                "type": "number",
                "name": "posting_rewards"
              },
              {
                "type": "array",
                "name": "proxied_vsf_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "text",
                "name": "proxy"
              },
              {
                "type": "text",
                "name": "received_vesting_shares"
              },
              {
                "type": "text",
                "name": "recovery_account"
              },
              {
                "type": "text",
                "name": "reputation"
              },
              {
                "type": "text",
                "name": "reset_account"
              },
              {
                "type": "text",
                "name": "reward_hbd_balance"
              },
              {
                "type": "text",
                "name": "reward_hive_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_hive"
              },
              {
                "type": "text",
                "name": "savings_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds_last_update"
              },
              {
                "type": "number",
                "name": "savings_withdraw_requests"
              },
              {
                "type": "array",
                "name": "tags_usage"
              },
              {
                "type": "text",
                "name": "to_withdraw"
              },
              {
                "type": "array",
                "name": "transfer_history"
              },
              {
                "type": "text",
                "name": "vesting_balance"
              },
              {
                "type": "text",
                "name": "vesting_shares"
              },
              {
                "type": "text",
                "name": "vesting_withdraw_rate"
              },
              {
                "type": "array",
                "name": "vote_history"
              },
              {
                "type": "object",
                "name": "voting_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "number",
                "name": "voting_power"
              },
              {
                "type": "number",
                "name": "withdraw_routes"
              },
              {
                "type": "text",
                "name": "withdrawn"
              },
              {
                "type": "array",
                "name": "witness_votes",
                "sub": [
                  {
                    "type": "text",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "number",
                "name": "witnesses_voted_for"
              }
            ]
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "inventorydata": [
      {
        "type": "array",
        "name": "data",
        "sub": [
          {
            "type": "text",
            "name": "uid"
          },
          {
            "type": "text",
            "name": "set"
          },
          {
            "type": "text",
            "name": "script"
          },
          {
            "type": "number",
            "name": "type"
          },
          {
            "type": "text",
            "name": "encoding"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      },
      {
        "type": "array",
        "name": "mint_tokens"
      },
      {
        "type": "text",
        "name": "user"
      }
    ],
    "iterator1": {
      "meta": null,
      "outputType": "object"
    },
    "inventory_iterator": {
      "meta": null,
      "outputType": "object"
    },
    "data_view1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeat1": {
      "meta": null,
      "outputType": "array"
    },
    "repeat2": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    }
  },
  "grid": {
    "dexapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "markets",
            "sub": [
              {
                "type": "object",
                "name": "hbd",
                "sub": [
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells"
                  },
                  {
                    "type": "array",
                    "name": "buys"
                  }
                ]
              },
              {
                "type": "object",
                "name": "hive",
                "sub": [
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "his",
                    "sub": [
                      {
                        "type": "object",
                        "name": "58385865:a7736ef00332eb898a860f7021298992680821b9",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "text",
                            "name": "timestamp"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "key_array",
                    "name": "sellOrders",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "co"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "co"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "buys"
                  }
                ]
              }
            ]
          },
          {
            "type": "key_array",
            "name": "queue",
            "sub": [
              {
                "type": "number",
                "name": "c"
              },
              {
                "type": "number",
                "name": "g"
              },
              {
                "type": "number",
                "name": "l"
              },
              {
                "type": "number",
                "name": "t"
              }
            ]
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ]
  },
  "status": {
    "markets": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "markets",
            "sub": [
              {
                "type": "object",
                "name": "node",
                "sub": [
                  {
                    "type": "object",
                    "name": "actifit-dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "amphlux.dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "ats-david",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "badcode",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "biq",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "cadlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "deluxe-node",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "disregardfiat",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "dlux-io",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "transfers"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "dluxfox",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "eastmael",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "fbslo.pay",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "fintechshark",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "fortnitefunnies",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "foxon.dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "freebornsociety",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "hexflex",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "heyhey",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "hive-123849",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "inconceivable",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "jenkem",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "makemoneyhd",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "markegiles",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "pizza-dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "ppextend",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "preevy",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "preludiocosmico",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "boolean",
                        "name": "mirror"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "premiumsfx",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "qwoyn-dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "rishi556-dlux",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "boolean",
                            "name": "escrow"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          },
                          {
                            "type": "text",
                            "name": "version"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "sexist",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "shmoogleosukami",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "prand"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "z-allyourchain",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  },
                  {
                    "type": "object",
                    "name": "z-isbelongtous",
                    "sub": [
                      {
                        "type": "number",
                        "name": "attempts"
                      },
                      {
                        "type": "number",
                        "name": "bidRate"
                      },
                      {
                        "type": "number",
                        "name": "burned"
                      },
                      {
                        "type": "number",
                        "name": "contracts"
                      },
                      {
                        "type": "text",
                        "name": "domain"
                      },
                      {
                        "type": "boolean",
                        "name": "escrow"
                      },
                      {
                        "type": "number",
                        "name": "escrows"
                      },
                      {
                        "type": "number",
                        "name": "lastGood"
                      },
                      {
                        "type": "number",
                        "name": "marketingRate"
                      },
                      {
                        "type": "number",
                        "name": "moved"
                      },
                      {
                        "type": "object",
                        "name": "report",
                        "sub": [
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "number",
                            "name": "block_num"
                          },
                          {
                            "type": "text",
                            "name": "hash"
                          },
                          {
                            "type": "text",
                            "name": "transaction_id"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "self"
                      },
                      {
                        "type": "number",
                        "name": "strikes"
                      },
                      {
                        "type": "number",
                        "name": "wins"
                      },
                      {
                        "type": "number",
                        "name": "yays"
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            "type": "key_array",
            "name": "stats",
            "sub": [
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "text",
                "name": "rate"
              },
              {
                "type": "number",
                "name": "vol"
              }
            ]
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
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
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
          }
        ]
      }
    ],
    "witnessdata": {
      "meta": [
        {
          "type": "object",
          "name": "actifit-dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "amphlux.dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "ats-david",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "badcode",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "biq",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "cadlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "deluxe-node",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "disregardfiat",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "dlux-io",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "transfers"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "dluxfox",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "eastmael",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "fbslo.pay",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "fintechshark",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "fortnitefunnies",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "foxon.dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "freebornsociety",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "hexflex",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "heyhey",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "hive-123849",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "inconceivable",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "jenkem",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "makemoneyhd",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "markegiles",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "pizza-dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "ppextend",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "preevy",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "preludiocosmico",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "boolean",
              "name": "mirror"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "premiumsfx",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "qwoyn-dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "rishi556-dlux",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "boolean",
                  "name": "escrow"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                },
                {
                  "type": "text",
                  "name": "version"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "sexist",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "shmoogleosukami",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "prand"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "z-allyourchain",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        },
        {
          "type": "object",
          "name": "z-isbelongtous",
          "sub": [
            {
              "type": "number",
              "name": "attempts"
            },
            {
              "type": "number",
              "name": "bidRate"
            },
            {
              "type": "number",
              "name": "burned"
            },
            {
              "type": "number",
              "name": "contracts"
            },
            {
              "type": "text",
              "name": "domain"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "number",
              "name": "escrows"
            },
            {
              "type": "number",
              "name": "lastGood"
            },
            {
              "type": "number",
              "name": "marketingRate"
            },
            {
              "type": "number",
              "name": "moved"
            },
            {
              "type": "object",
              "name": "report",
              "sub": [
                {
                  "type": "number",
                  "name": "block"
                },
                {
                  "type": "number",
                  "name": "block_num"
                },
                {
                  "type": "text",
                  "name": "hash"
                },
                {
                  "type": "text",
                  "name": "transaction_id"
                }
              ]
            },
            {
              "type": "text",
              "name": "self"
            },
            {
              "type": "number",
              "name": "strikes"
            },
            {
              "type": "number",
              "name": "wins"
            },
            {
              "type": "number",
              "name": "yays"
            }
          ]
        }
      ],
      "outputType": "object"
    },
    "repeat1": {
      "meta": [
        {
          "type": "number",
          "name": "block"
        },
        {
          "type": "number",
          "name": "block_num"
        },
        {
          "type": "boolean",
          "name": "escrow"
        },
        {
          "type": "text",
          "name": "hash"
        },
        {
          "type": "text",
          "name": "prand"
        },
        {
          "type": "text",
          "name": "transaction_id"
        },
        {
          "type": "text",
          "name": "version"
        }
      ],
      "outputType": "object"
    },
    "repeat2": {
      "meta": [
        {
          "type": "number",
          "name": "attempts"
        },
        {
          "type": "number",
          "name": "bidRate"
        },
        {
          "type": "number",
          "name": "contracts"
        },
        {
          "type": "text",
          "name": "domain"
        },
        {
          "type": "boolean",
          "name": "escrow"
        },
        {
          "type": "number",
          "name": "escrows"
        },
        {
          "type": "number",
          "name": "lastGood"
        },
        {
          "type": "number",
          "name": "marketingRate"
        },
        {
          "type": "number",
          "name": "moved"
        },
        {
          "type": "object",
          "name": "report",
          "sub": [
            {
              "type": "number",
              "name": "block"
            },
            {
              "type": "number",
              "name": "block_num"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "text",
              "name": "hash"
            },
            {
              "type": "text",
              "name": "prand"
            },
            {
              "type": "text",
              "name": "transaction_id"
            },
            {
              "type": "text",
              "name": "version"
            }
          ]
        },
        {
          "type": "text",
          "name": "self"
        },
        {
          "type": "number",
          "name": "wins"
        },
        {
          "type": "number",
          "name": "yays"
        }
      ],
      "outputType": "object"
    },
    "var1": {
      "meta": [
        {
          "type": "number",
          "name": "attempts"
        },
        {
          "type": "number",
          "name": "bidRate"
        },
        {
          "type": "number",
          "name": "contracts"
        },
        {
          "type": "text",
          "name": "domain"
        },
        {
          "type": "boolean",
          "name": "escrow"
        },
        {
          "type": "number",
          "name": "escrows"
        },
        {
          "type": "number",
          "name": "lastGood"
        },
        {
          "type": "number",
          "name": "marketingRate"
        },
        {
          "type": "number",
          "name": "moved"
        },
        {
          "type": "object",
          "name": "report",
          "sub": [
            {
              "type": "number",
              "name": "block"
            },
            {
              "type": "number",
              "name": "block_num"
            },
            {
              "type": "boolean",
              "name": "escrow"
            },
            {
              "type": "text",
              "name": "hash"
            },
            {
              "type": "text",
              "name": "prand"
            },
            {
              "type": "text",
              "name": "transaction_id"
            },
            {
              "type": "text",
              "name": "version"
            }
          ]
        },
        {
          "type": "text",
          "name": "self"
        },
        {
          "type": "number",
          "name": "wins"
        },
        {
          "type": "number",
          "name": "yays"
        }
      ],
      "outputType": "object"
    }
  },
  "new": {
    "statsapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "IPFSRate"
              },
              {
                "type": "number",
                "name": "MSHeld"
              },
              {
                "type": "number",
                "name": "budgetRate"
              },
              {
                "type": "number",
                "name": "currationRate"
              },
              {
                "type": "number",
                "name": "delegationRate"
              },
              {
                "type": "text",
                "name": "dluxPerDel"
              },
              {
                "type": "number",
                "name": "gov_threshhold"
              },
              {
                "type": "text",
                "name": "hashLastIBlock"
              },
              {
                "type": "number",
                "name": "icoPrice"
              },
              {
                "type": "number",
                "name": "icoRound"
              },
              {
                "type": "number",
                "name": "interestRate"
              },
              {
                "type": "text",
                "name": "lastBlock"
              },
              {
                "type": "number",
                "name": "lastIBlock"
              },
              {
                "type": "number",
                "name": "marketingRate"
              },
              {
                "type": "number",
                "name": "maxBudget"
              },
              {
                "type": "number",
                "name": "max_transfer"
              },
              {
                "type": "object",
                "name": "movingWeight",
                "sub": [
                  {
                    "type": "number",
                    "name": "dailyPool"
                  },
                  {
                    "type": "number",
                    "name": "running"
                  }
                ]
              },
              {
                "type": "number",
                "name": "multiSigCollateral"
              },
              {
                "type": "number",
                "name": "nft_byte_cost"
              },
              {
                "type": "number",
                "name": "nft_fee_1"
              },
              {
                "type": "number",
                "name": "nodeRate"
              },
              {
                "type": "number",
                "name": "outOnBlock"
              },
              {
                "type": "number",
                "name": "resteemReward"
              },
              {
                "type": "number",
                "name": "safetyLimit"
              },
              {
                "type": "number",
                "name": "savingsRate"
              },
              {
                "type": "number",
                "name": "tokenSupply"
              }
            ]
          },
          {
            "type": "object",
            "name": "hiveVWMA",
            "sub": [
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "text",
                "name": "rate"
              },
              {
                "type": "number",
                "name": "vol"
              }
            ]
          },
          {
            "type": "object",
            "name": "hbdVWMA",
            "sub": [
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "text",
                "name": "rate"
              },
              {
                "type": "number",
                "name": "vol"
              }
            ]
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "node"
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
    ]
  }
});
