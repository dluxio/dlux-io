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
    },
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
                    "type": "text",
                    "name": "buyBook"
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
                    "type": "text",
                    "name": "sellBook"
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
                    "type": "text",
                    "name": "buyBook"
                  },
                  {
                    "type": "object",
                    "name": "buyOrders",
                    "sub": [
                      {
                        "type": "object",
                        "name": "0.999001:DLUXQmSPWMuYLAYk5Wwhpswm2Z6wkKHpuY8vN1yuGPzsjq5AGT",
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
                            "type": "number",
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
                    "type": "text",
                    "name": "sellBook"
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
                    "name": "buys",
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
                        "type": "number",
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
    "orderbookview": {
      "meta": null,
      "outputType": "array"
    },
    "repeat1": {
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
          "type": "number",
          "name": "amount"
        },
        {
          "type": "number",
          "name": "block"
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
          "type": "number",
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
      ],
      "outputType": "array"
    },
    "hivebuys": {
      "meta": [
        {
          "type": "text",
          "name": "trade_id"
        },
        {
          "type": "text",
          "name": "price"
        },
        {
          "type": "text",
          "name": "base_volume"
        },
        {
          "type": "text",
          "name": "target_volume"
        },
        {
          "type": "number",
          "name": "trade_timestamp"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    },
    "buyorders": {
      "meta": [
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "array",
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
              "type": "number",
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
        }
      ],
      "outputType": "object"
    },
    "recenthiveapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "recent_trades",
            "sub": [
              {
                "type": "text",
                "name": "trade_id"
              },
              {
                "type": "text",
                "name": "price"
              },
              {
                "type": "text",
                "name": "base_volume"
              },
              {
                "type": "text",
                "name": "target_volume"
              },
              {
                "type": "number",
                "name": "trade_timestamp"
              },
              {
                "type": "text",
                "name": "type"
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
    "recenthbdapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "recent_trades"
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
    "orderhistory": {
      "meta": [
        {
          "type": "text",
          "name": "trade_id"
        },
        {
          "type": "text",
          "name": "price"
        },
        {
          "type": "text",
          "name": "base_volume"
        },
        {
          "type": "text",
          "name": "target_volume"
        },
        {
          "type": "number",
          "name": "trade_timestamp"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    }
  }
});
